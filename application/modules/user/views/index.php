<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $judul ?></h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            User Management
                        </h3>
                        <br>
                        <hr>
                        <button type="button" class="btn btn-success btn-sm" id="tambah"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                    <div class="card-body pad table-responsive">
                        <table class="table table-bordered table-sm" id="myData" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form">
                <div class="modal-body">
                    <div id="alert"></div>
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" name="user" id="user" class="form-control form-control-sm" placeholder="Username" required>
                    </div>
                    <div id="tes"></div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control form-control-sm" required>
                            <option value="">Pilih Role</option>
                            <?php foreach ($role as $r) {
                                if ($this->session->userdata('role') != 1) {
                                    if ($r->id_role != 1) { ?>
                                        <option value="<?= $r->id_role ?>"><?= $r->role ?></option>
                                    <?php }
                                } else { ?>
                                    <option value="<?= $r->id_role ?>"><?= $r->role ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="btn">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const form = $('.modal-body').html();
        $('#myData').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('user/getLists'); ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });
        $('#tambah').click(function() {
            $('.modal-body').html(form);
            tambah =
                '<input type="hidden" name="aksi" id="aksi">' +
                '<div class="form-group">' +
                '<label for="pass">Password</label>' +
                '<div class="input-group mb-3">' +
                '<input type="password" name="pass" id="pass" placeholder="Password" class="form-control form-control-sm" required>' +
                '<div class="input-group-append">' +
                '<span class="input-group-text"><i class="fas fa-fw fa-eye"></i></span>' +
                '</div>' +
                '</div>';
            $('#modal').find('h5').html('Tambah');
            $('#modal').find('#tes').html(tambah);
            $('#modal').find('#btn').html('Tambah');
            $('#aksi').val('tambah');
            $('#modal').modal('show');
            $('.input-group-text').click(function() {
                if ($('#pass').is(':password')) {
                    $('#pass').attr('type', 'text');
                    $(this).find('i').addClass('fa-eye-slash');
                    $(this).find('i').removeClass('fa-eye');
                } else {
                    $('#pass').attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash');
                    $(this).find('i').addClass('fa-eye');
                }
            });
        });
        $('#data').on('click', '#active', function() {
            id_user = $(this).data('id_user');
            active = $(this).data('active');
            $.ajax({
                url: '<?= site_url('user/active') ?>',
                type: 'post',
                data: {
                    id: id_user,
                    active: active
                },
                dataType: 'json',
                success: function(data) {
                    $('#myData').DataTable().ajax.reload();
                    if (data.active == 'true') {
                        $(document).Toasts('create', {
                            title: 'Success',
                            body: 'Akun Aktif',
                            class: 'bg-success mt-4 mr-4'
                        });
                    } else {
                        $(document).Toasts('create', {
                            title: 'Success',
                            body: 'Akun Nonaktif',
                            class: 'bg-danger mt-4 mr-4'
                        });
                    }
                }
            })
        })
        $('#data').on('click', '.edit', function() {
            $('.modal-body').html(form);
            edit = '<input type="hidden" name="id" id="id">' +
                '<input type="hidden" name="aksi" id="aksi">';
            $('#modal').find('h5').html('Edit');
            $('#modal').find('#tes').html(edit);
            $('#modal').find('#btn').html('Edit');
            user = $(this).data('user');
            id = $(this).data('id');
            id_role = $(this).data('id_role');
            $('#user').val(user);
            $('#role').val(id_role);
            $('#id').val(id);
            $('#aksi').val('edit');
            $('#modal').modal('show');
        });
        $('#data').on('click', '.reset', function() {
            $('.modal-body').html(form);
            reset = '<input type="hidden" name="id" id="id">' +
                '<input type="hidden" name="aksi" id="aksi">' +
                '<div class="form-group">' +
                '<label for="pass">New Password</label>' +
                '<div class="input-group mb-3">' +
                '<input type="password" name="pass" id="pass" placeholder="Password" class="form-control form-control-sm" required>' +
                '<div class="input-group-append">' +
                '<span class="input-group-text"><i class="fas fa-fw fa-eye"></i></span>' +
                '</div>' +
                '</div>';
            $('#modal').find('h5').html('Reset');
            $('#modal').find('.modal-body').html(reset);
            $('#modal').find('#btn').html('Reset');
            id = $(this).data('id_reset');
            $('#id').val(id);
            $('#aksi').val('reset');
            $('#modal').modal('show');
            $('.input-group-text').click(function() {
                if ($('#pass').is(':password')) {
                    $('#pass').attr('type', 'text');
                    $(this).find('i').addClass('fa-eye-slash');
                    $(this).find('i').removeClass('fa-eye');
                } else {
                    $('#pass').attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash');
                    $(this).find('i').addClass('fa-eye');
                }
            });
        });
        $('#data').on('click', '.hapus', function() {
            $('.modal-body').html(form);
            hapus = '<input type="hidden" name="id" id="id">' +
                '<input type="hidden" name="aksi" id="aksi">' +
                '<h3>Apakah Anda Yakin ?</h3>';
            $('#modal').find('h5').html('Hapus');
            $('#modal').find('.modal-body').html(hapus);
            $('#modal').find('#btn').html('Hapus');
            id = $(this).data('id_hapus');
            $('#id').val(id);
            $('#aksi').val('hapus');
            $('#modal').modal('show');
        });
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= site_url('user/aksi') ?>',
                type: 'post',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    var pesan = data;
                    $(document).Toasts('create', {
                        title: 'Success',
                        body: pesan,
                        class: 'bg-success mt-4 mr-4'
                    });
                    $('#myData').DataTable().ajax.reload();
                    $('#modal').modal('hide');
                }
            })
        })
    });
</script>