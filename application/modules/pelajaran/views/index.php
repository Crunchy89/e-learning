<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Pelajaran kelas <?= $title ?></h3>
                    <br>
                    <hr>
                    <button type="button" class="btn btn-info btn-sm" id="kembali"><i class="fa fa-arrow-left"></i> Kembali</button>
                    <button type="button" class="btn btn-primary btn-sm" id="reload"><i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-success btn-sm" id="tambah"><i class="fa fa-plus"></i> Tambah</button>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="myData" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelajaran</th>
                                    <th>Guru</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Aksi</th>
                                </tr>
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
        const form = $('.modal-body').html();
        id_kelas = $('#id_kelas').val();
        // $('#myData').DataTable({
        //     "processing": true,
        //     "serverSide": true,
        //     "order": [],
        //     "ajax": {
        //         "url": "<?= site_url('submenu/getLists/'); ?>" + id_kelas,
        //         "type": "POST"
        //     },
        //     "columnDefs": [{
        //         "targets": [0],
        //         "orderable": false
        //     }]
        // });
        // $('#tambah').click(function() {
        //     $('.modal-body').html(form);
        //     aksi =
        //         '<input type="hidden" name="aksi" id="aksi">' +
        //         '<input type="hidden" name="id_m" id="id_m">';
        //     $('#add').html(aksi);
        //     $('#modal').find('h5').html('Tambah')
        //     $('#modal').find('#btn').html('Tambah')
        //     $('#aksi').val('tambah');
        //     $('#id_m').val(id_menu);
        //     $('#modal').modal('show');
        // });
        // $('#data').on('click', '.edit', function() {
        //     $('.modal-body').html(form);
        //     aksi = '<input type="hidden" name="aksi" id="aksi">' +
        //         '<input type="hidden" name="id" id="id">' +
        //         '<input type="hidden" name="id_m" id="id_m">';
        //     $('#add').html(aksi);
        //     $('#modal').find('h5').html('Edit')
        //     $('#modal').find('#btn').html('Edit')
        //     id = $(this).data('id_submenu');
        //     title = $(this).data('title');
        //     icon = $(this).data('icon');
        //     url = $(this).data('url');
        //     $('#aksi').val('edit');
        //     $('#id').val(id);
        //     $('#title').val(title);
        //     $('#icon').val(icon);
        //     $('#url').val(url);
        //     $('#id_m').val(id_menu);
        //     $('#modal').modal('show');
        // });
        // $('#data').on('click', '.hapus', function() {
        //     $('.modal-body').html(form);
        //     aksi = '<input type="hidden" name="aksi" id="aksi">' +
        //         '<input type="hidden" name="id" id="id">' +
        //         '<h3>Apakah Anda Yakin ?</h3>';
        //     $('.modal-body').html(aksi);
        //     $('#modal').find('h5').html('Hapus')
        //     $('#modal').find('#btn').html('Hapus')
        //     id = $(this).data('id_submenu');
        //     $('#aksi').val('hapus');
        //     $('#id').val(id);
        //     $('#modal').modal('show');
        // });
        // $('#form').submit(function(e) {
        //     e.preventDefault();
        //     $.ajax({
        //         url: '<?= site_url('submenu/aksi') ?>',
        //         type: 'post',
        //         data: new FormData(this),
        //         processData: false,
        //         contentType: false,
        //         async: false,
        //         success: function(data) {
        //             show_data();
        //             var pesan = data;
        //             $(document).Toasts('create', {
        //                 title: 'Success',
        //                 body: pesan,
        //                 class: 'bg-success mt-4 mr-4'
        //             });
        //             $('#myData').DataTable().ajax.reload();
        //             $('#modal').modal('hide');
        //         }
        //     })
        // });
        $('#kembali').click(function() {
            $('#show_data').load('<?= site_url('kelas') ?>');
        });
        $('#reload').click(function() {
            $('#show_data').load('<?= site_url('siswa/index/') ?>' + id_menu);
        });

    });
</script>