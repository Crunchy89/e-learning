<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $judul ?> <?= $title ?></h1>
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
                        <label for="title">Nama Menu</label>
                        <input type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Nama Menu" required>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" name="icon" id="icon" class="form-control form-control-sm" placeholder="Icon" required>
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
        // $('#myData').DataTable({
        //     "processing": true,
        //     "serverSide": true,
        //     "order": [],
        //     "ajax": {
        //         "url": "<?= site_url('submenu/getLists'); ?>",
        //         "type": "POST"
        //     },
        //     "columnDefs": [{
        //         "targets": [0],
        //         "orderable": false
        //     }]
        // });
        // $('#tambah').click(function() {
        //     $('.modal-body').html(form);
        //     aksi = '<input type="hidden" name="aksi" id="aksi">';
        //     $('#add').html(aksi);
        //     $('#modal').find('h5').html('Tambah')
        //     $('#modal').find('#btn').html('Tambah')
        //     $('#aksi').val('tambah');
        //     $('#modal').modal('show');
        // });
        // $('#data').on('click', '.edit', function() {
        //     $('.modal-body').html(form);
        //     aksi = '<input type="hidden" name="aksi" id="aksi">' +
        //         '<input type="hidden" name="id" id="id">';
        //     $('#add').html(aksi);
        //     $('#modal').find('h5').html('Edit')
        //     $('#modal').find('#btn').html('Edit')
        //     id = $(this).data('id_menu');
        //     title = $(this).data('title');
        //     icon = $(this).data('icon');
        //     $('#aksi').val('edit');
        //     $('#id').val(id);
        //     $('#title').val(title);
        //     $('#icon').val(icon);
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
        //     id = $(this).data('id_menu');
        //     $('#aksi').val('hapus');
        //     $('#id').val(id);
        //     $('#modal').modal('show');
        // });
        // $('#form').submit(function(e) {
        //     e.preventDefault();
        //     $.ajax({
        //         url: '<?= site_url('menu/aksi') ?>',
        //         type: 'post',
        //         data: new FormData(this),
        //         processData: false,
        //         contentType: false,
        //         async: false,
        //         success: function(data) {
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
        // $('#data').on('click', '#active', function() {
        //     id_menu = $(this).data('id_menu');
        //     active = $(this).data('active');
        //     $.ajax({
        //         url: '<?= site_url('menu/active') ?>',
        //         type: 'post',
        //         data: {
        //             id: id_menu,
        //             active: active
        //         },
        //         dataType: 'json',
        //         success: function(data) {
        //             $('#myData').DataTable().ajax.reload();
        //             if (data.active == 'true') {
        //                 $(document).Toasts('create', {
        //                     title: 'Success',
        //                     body: 'Menu Aktif',
        //                     class: 'bg-success mt-4 mr-4'
        //                 });
        //             } else {
        //                 $(document).Toasts('create', {
        //                     title: 'Success',
        //                     body: 'Menu Nonaktif',
        //                     class: 'bg-danger mt-4 mr-4'
        //                 });
        //             }
        //         }
        //     })
        // });
        $('#kembali').click(function() {
            $('#show_data').load('<?= site_url('menu') ?>');
        });
    });
</script>