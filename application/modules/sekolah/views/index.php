<section class="content-header">
	<h1>
		<?= $judul ?>
	</h1>
</section>

<section class="content">

	<div class="row">
		<div class="col-md-3">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile" id="pro">

				</div>
			</div>
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#activity" data-toggle="tab">Profil Sekolah</a></li>
					<li><a href="#medsos" data-toggle="tab">Media Sosial</a></li>
					<li><a href="#settings" data-toggle="tab">Settings</a></li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="activity">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-2">Nama Sekolah</label>
								<div class="col-sm-10">
									<input type="text" name="nama" class="form-control" disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Nomor Telepon</label>
								<div class="col-sm-10">
									<input type="text" name="no" class="form-control" disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Alamat Sekolah</label>
								<div class="col-sm-10">
									<textarea name="alamat" cols="30" rows="3" class="form-control" disabled></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Jurusan</label>
								<div class="col-sm-10">
									<table width="100%">
										<thead class="thead-dark">
											<tr>
												<th>Nama Jurusan</th>
												<th>Jumlah Kelas</th>
											</tr>
										</thead>
										<?php foreach ($jurusan as $j) : ?>
											<tr>
												<th>
													<h4><?= $j->jurusan ?></h4>
												</th>
												<td>
													<h4><?= count($this->db->get_where('kelas', ['id_jurusan' => $j->id_jurusan])->result()) ?> Kelas</h4>
												</td>
											</tr>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</form>
					</div>
					<div class=" tab-pane" id="medsos">
						<button type="button" id="tambah" class="btn btn-primary">Tambah</button>
						<hr>
						<div class="table-responsive">
							<table class="table table-bordered table-sm" id="myData" width="100%">
								<thead class="thead-dark">
									<tr>
										<th>No</th>
										<th>Url</th>
										<th>Icon</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="data">
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane" id="settings">
						<form id="profil" action="#" method="post" class="form-horizontal">
							<div class="form-group">
								<label for="nama" class="col-sm-2 control-label">Nama Sekolah</label>
								<div class="col-sm-10">
									<input type="hidden" name="gambarLama">
									<input type="text" name="nama" id="nama" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label for="no" class="col-sm-2 control-label">Nomor Telepon</label>
								<div class="col-sm-10">
									<input type="number" name="no" id="no" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label for="nama" class="col-sm-2 control-label">Alamat Sekolah</label>
								<div class="col-sm-10">
									<textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="gambar" class="col-sm-2">Logo Sekolah</label>
								<div class="col-sm-10">
									<div class="form-group">
										<label for="gambar" class="col-sm-4" id="reset"><img class="img-fluid" src="<?= base_url() ?>assets/img/noimage.png" id="output" width="200px" height="200px"></label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="custom-file">
													<input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" id="save" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Simpan</button>
							<button type="button" id="btn-reset" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i> Reset</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

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
							<label for="link">Link</label>
							<input type="text" name="link" id="link" class="form-control form-control-sm" placeholder="masukkan Link" required>
						</div>
						<div class="form-group">
							<label for="icon">Icon</label>
							<select name="icon" id="icon" class="form-control" required>
								<option value="">Pilih Icon</option>
								<option value="fa fa-fw fa-facebook">Facebook</option>
								<option value="fa fa-fw fa-instagram">Instagram</option>
								<option value="fa fa-fw fa-twitter">Twitter</option>
								<option value="fa fa-fw fa-youtube-play">Youtube</option>
								<option value="fa fa-fw fa-whatsapp">Whatsapp</option>
							</select>
						</div>
						<div class="form-group">
							<label for="warna">Warna</label>
							<select name="warna" id="warna" class="form-control" required>
								<option value="">Pilih Warna</option>
								<option value="btn-success">Hijau</option>
								<option value="btn-primary">Biru</option>
								<option value="btn-info">Biru Langit</option>
								<option value="btn-danger">Merah</option>
								<option value="btn-warning">Orange</option>
							</select>
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

</section>
<script>
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
	$(document).ready(function() {
		show_data()
		const form = $('.modal-body').html();

		function show_data() {
			$.ajax({
				url: '<?= site_url('sekolah/getProfile') ?>',
				type: 'POST',
				dataType: 'json',
				success: function(result) {
					$('[name="nama"]').val(result.nama);
					$('[name="gambarLama"]').val(result.logo);
					$('[name="no"]').val(result.nohp);
					$('[name="alamat"]').val(result.alamat);
					$('#reset').html('<img src="<?= base_url() ?>assets/img/profile/' + result.logo + '" alt="Logo Sekolah" id="output" width="200px" height="200px">');
					var med = '';
					var sub = '';
					$.ajax({
						url: '<?= site_url('sekolah/getMedsos') ?>',
						type: 'POST',
						dataType: 'json',
						success: function(medsos) {
							for (var i = 0; i < medsos.length; i++) {
								med += '<a href="' + medsos[i].link + '" class="btn btn-social-icon ' + medsos[i].warna + '"><i class="' + medsos[i].icon + '"></i></a> ';
							}
							sub = med;
							html = '<img class="profile-user-img img-responsive logo" id="logo" src="<?= base_url() ?>assets/img/profile/' + result.logo + '" alt="Logo Sekolah">' +
								'<p class="profile-username text-center nama">' + result.nama + '</p>' +
								'<p class="text-muted text-center alamat">' + result.alamat + '</p>' +
								'<ul class="list-group list-group-unbordered">' +
								'<li class="list-group-item" id="guru">' +
								'<b>Guru</b> <a class="pull-right">543</a>' +
								'</li>' +
								'<li class="list-group-item">' +
								'<b>Siswa</b> <a class="pull-right">1,322</a>' +
								'</li>' +
								'</ul>' +
								'<div class="text-center" id="sosial">' +
								sub +
								'</div>';
							$('#pro').html(html);
						}
					})
				}
			})
		}
		$('#myData').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= site_url('medsos/getLists'); ?>",
				"type": "POST"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false
			}]
		});
		$('#tambah').click(function() {
			$('.modal-body').html(form);
			aksi = '<input type="hidden" name="aksi" id="aksi">';
			$('#add').html(aksi);
			$('#modal').find('h5').html('Tambah')
			$('#modal').find('#btn').html('Tambah')
			$('#aksi').val('tambah');
			$('#modal').modal('show');
		});
		$('#data').on('click', '.edit', function() {
			$('.modal-body').html(form);
			aksi = '<input type="hidden" name="aksi" id="aksi">' +
				'<input type="hidden" name="id" id="id">';
			$('#add').html(aksi);
			$('#modal').find('h5').html('Edit')
			$('#modal').find('#btn').html('Edit')
			id = $(this).data('id');
			icon = $(this).data('icon');
			link = $(this).data('link');
			warna = $(this).data('warna');
			$('#aksi').val('edit');
			$('#id').val(id);
			$('#icon').val(icon);
			$('#link').val(link);
			$('#warna').val(warna);
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
			id = $(this).data('id');
			$('#aksi').val('hapus');
			$('#id').val(id);
			$('#modal').modal('show');
		});
		$('#form').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?= site_url('medsos/aksi') ?>',
				type: 'post',
				data: new FormData(this),
				dataType: 'json',
				processData: false,
				contentType: false,
				async: false,
				success: function(result) {
					if (result.status == true) {
						toastr["success"](result.pesan);
					} else {
						toastr["error"](result.pesan);
					}
					$('#myData').DataTable().ajax.reload();
					$('#modal').modal('hide');
					var med = '';
					$.ajax({
						url: '<?= site_url('sekolah/getMedsos') ?>',
						type: 'POST',
						dataType: 'json',
						success: function(medsos) {
							for (var i = 0; i < medsos.length; i++) {
								med += '<a href="' + medsos[i].link + '" class="btn btn-social-icon ' + medsos[i].warna + '"><i class="' + medsos[i].icon + '"></i></a> ';
							}
							sub = med;
							$('#sosial').html(sub);
						}
					})
				}
			})
		})
		$('#btn-reset').click(function() {
			show_data();
		});
		$('#profil').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?= site_url('sekolah/update') ?>',
				type: 'POST',
				data: new FormData(this),
				dataType: 'json',
				contentType: false,
				processData: false,
				async: false,
				success: function(hasil) {
					toastr['success'](hasil.pesan);
					$('[name="gambar"]').val('');
					$.ajax({
						url: '<?= site_url('sekolah/getProfile') ?>',
						type: 'POST',
						dataType: 'json',
						success: function(result) {
							$('[name="nama"]').val(result.nama);
							$('[name="gambarLama"]').val(result.logo);
							$('[name="no"]').val(result.nohp);
							$('[name="alamat"]').val(result.alamat);
							$('#reset').html('<img src="<?= base_url() ?>assets/img/profile/' + result.logo + '" alt="Logo Sekolah" id="output" width="200px" height="200px">');
							$('.LOGO').html('<img class="user-image" src="<?= base_url() ?>assets/img/profile/' + result.logo +
								'" width="40px" height="40px" alt="Logo">');
							var med = '';
							var sub = '';
							$.ajax({
								url: '<?= site_url('sekolah/getMedsos') ?>',
								type: 'POST',
								dataType: 'json',
								success: function(medsos) {
									for (var i = 0; i < medsos.length; i++) {
										med += '<a href="' + medsos[i].link + '" class="btn btn-social-icon ' + medsos[i].warna + '"><i class="' + medsos[i].icon + '"></i></a> ';
									}
									sub = med;
									html = '<img class="profile-user-img img-responsive logo" id="logo" src="<?= base_url() ?>assets/img/profile/' + result.logo + '" alt="Logo Sekolah">' +
										'<p class="profile-username text-center nama">' + result.nama + '</p>' +
										'<p class="text-muted text-center alamat">' + result.alamat + '</p>' +
										'<ul class="list-group list-group-unbordered">' +
										'<li class="list-group-item" id="guru">' +
										'<b>Guru</b> <a class="pull-right">543</a>' +
										'</li>' +
										'<li class="list-group-item">' +
										'<b>Siswa</b> <a class="pull-right">1,322</a>' +
										'</li>' +
										'</ul>' +
										'<div class="text-center" id="sosial">' +
										sub +
										'</div>';
									$('#pro').html(html);
								}
							})
						}
					})
				}
			})
		})
	})
</script>