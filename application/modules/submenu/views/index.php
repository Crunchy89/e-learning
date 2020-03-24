<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $judul ?> <?= $title ?></h1>
                <input type="hidden" name="id_menu" id="id_menu" value="<?= $id ?>">
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
                            Submenu Management
                        </h3>
                        <br>
                        <hr>
                        <button type="button" class="btn btn-info btn-sm" id="kembali"><i class="fas fa-arrow-left"></i> Kembali</button>
                        <button type="button" class="btn btn-primary btn-sm" id="reload"><i class="fas fa-sync-alt"></i> Refresh</button>
                        <button type="button" class="btn btn-success btn-sm" id="tambah"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                    <div class="card-body pad table-responsive">
                        <table class="table table-bordered table-sm" id="myData" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama SubMenu</th>
                                    <th>Icon</th>
                                    <th>Url</th>
                                    <th>Order</th>
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
                    <div class="form-group">
                        <label for="title">Nama Submenu</label>
                        <input type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Nama Menu" required>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" name="icon" id="icon" class="form-control form-control-sm" placeholder="Icon" required>
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" name="url" id="url" class="form-control form-control-sm" placeholder="Url" required>
                    </div>
                    <div id="add">
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
        function show_data() {
            $.ajax({
                url: '<?= site_url('admin/menu') ?>',
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    var menu = ''
                    for (var i = 0; i < data.length; i++) {
                        var sub = '';
                        for (var j = 0; j < data[i].submenu.length; j++) {
                            submenu = '<li class="nav-item" data-url="' + data[i].submenu[j].url + '">' +
                                '<a href="#" class="nav-link">' +
                                '<i class="' + data[i].submenu[j].icon + ' nav-icon"></i>' +
                                '<p>' + data[i].submenu[j].title + '</p>' +
                                '</a>' +
                                '</li>';
                            sub += submenu;
                        }
                        menu += '<li class="nav-item has-treeview">' +
                            '<a href="#" class="nav-link">' +
                            '<i class="nav-icon ' + data[i].icon + '"></i>' +
                            '<p>' +
                            data[i].title +
                            '<i class="right fas fa-angle-left"></i>' +
                            '</p>' +
                            '</a>' +
                            '<ul class="nav nav-treeview submenu" >' + sub + '</ul>' +
                            '</li>';
                    }
                    $('#menu').html(menu);
                    $('.nav-link').click(function() {
                        $('.nav-link').removeClass('active');
                        $(this).addClass('active');
                    });
                    $('.submenu').on('click', '.nav-item', function() {
                        url = $(this).data('url');
                        $('#show_data').load('<?= site_url() ?>' + '/' + url);
                    });
                }
            })
        }
        const form = $('.modal-body').html();
        id_menu = $('#id_menu').val();
        $('#myData').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('submenu/getLists/'); ?>" + id_menu,
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });
        $('#tambah').click(function() {
            $('.modal-body').html(form);
            aksi =
                '<input type="hidden" name="aksi" id="aksi">' +
                '<input type="hidden" name="id_m" id="id_m">';
            $('#add').html(aksi);
            $('#modal').find('h5').html('Tambah')
            $('#modal').find('#btn').html('Tambah')
            $('#aksi').val('tambah');
            $('#id_m').val(id_menu);
            $('#modal').modal('show');
        });
        $('#data').on('click', '.edit', function() {
            $('.modal-body').html(form);
            aksi = '<input type="hidden" name="aksi" id="aksi">' +
                '<input type="hidden" name="id" id="id">' +
                '<input type="hidden" name="id_m" id="id_m">';
            $('#add').html(aksi);
            $('#modal').find('h5').html('Edit')
            $('#modal').find('#btn').html('Edit')
            id = $(this).data('id_submenu');
            title = $(this).data('title');
            icon = $(this).data('icon');
            url = $(this).data('url');
            $('#aksi').val('edit');
            $('#id').val(id);
            $('#title').val(title);
            $('#icon').val(icon);
            $('#url').val(url);
            $('#id_m').val(id_menu);
            $('#modal').modal('show');
        });
        $('#data').on('click', '.hapus', function() {
            $('.modal-body').html(form);
            aksi = '<input type="hidden" name="aksi" id="aksi">' +
                '<input type="hidden" name="id" id="id">' +
                '<h3>Apakah Anda Yakin ?</h3>';
            $('.modal-body').html(aksi);
            $('#modal').find('h5').html('Hapus')
            $('#modal').find('#btn').html('Hapus')
            id = $(this).data('id_submenu');
            $('#aksi').val('hapus');
            $('#id').val(id);
            $('#modal').modal('show');
        });
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= site_url('submenu/aksi') ?>',
                type: 'post',
                data: new FormData(this),
                processData: false,
                contentType: false,
                async: false,
                success: function(data) {
                    show_data();
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
        });
        $('#data').on('click', '#active', function() {
            id_menu = $(this).data('id_submenu');
            active = $(this).data('active');
            $.ajax({
                url: '<?= site_url('submenu/active') ?>',
                type: 'post',
                data: {
                    id: id_menu,
                    active: active
                },
                dataType: 'json',
                success: function(data) {
                    show_data();
                    $('#myData').DataTable().ajax.reload();
                    if (data.active == 'true') {
                        $(document).Toasts('create', {
                            title: 'Success',
                            body: 'Submenu Aktif',
                            class: 'bg-success mt-4 mr-4'
                        });
                    } else {
                        $(document).Toasts('create', {
                            title: 'Success',
                            body: 'Submenu Nonaktif',
                            class: 'bg-danger mt-4 mr-4'
                        });
                    }
                }
            })
        });
        $('#kembali').click(function() {
            $('#show_data').load('<?= site_url('menu') ?>');
        });
        $('#reload').click(function() {
            $('#show_data').load('<?= site_url('submenu/index/') ?>' + id_menu);
        });

        $('#data').on('click', '.down', function() {
            no = $(this).data('order');
            id = $(this).data('id_menu');
            id_sub = $(this).data('id_submenu');
            $.ajax({
                url: '<?= site_url('submenu/down') ?>',
                type: 'post',
                data: {
                    no_order: no,
                    id_menu: id,
                    id_submenu: id_sub
                },
                dataType: 'json',
                success: function(result) {
                    show_data();
                    $('#myData').DataTable().ajax.reload();
                }
            })
        });
        $('#data').on('click', '.up', function() {
            no = $(this).data('order');
            id = $(this).data('id_menu');
            id_sub = $(this).data('id_submenu');
            $.ajax({
                url: '<?= site_url('submenu/up') ?>',
                type: 'post',
                data: {
                    no_order: no,
                    id_menu: id,
                    id_submenu: id_sub
                },
                dataType: 'json',
                success: function(result) {
                    show_data();
                    $('#myData').DataTable().ajax.reload();
                }
            })
        });

    });
</script>