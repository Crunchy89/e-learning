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
					<img class="profile-user-img img-responsive img-circle logo" id="logo" src="<?= base_url() ?>assets/img/logo.png" alt="Logo Sekolah">

					<p class="profile-username text-center nama">SMK Alhasanain NU Beraim</p>

					<p class="text-muted text-center alamat">Jln. ahmad yani no 5 beraim</p>

					<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<b>Guru</b> <a class="pull-right">543</a>
						</li>
						<li class="list-group-item">
							<b>Siswa</b> <a class="pull-right">1,322</a>
						</li>
					</ul>
					<div class="text-center" id="sosial">
						<a href="" class="btn btn-social-icon btn-facebook"><i class="fa fa-fw fa-facebook-f"></i></a>
						<a href="" class="btn btn-social-icon btn-danger"><i class="fa fa-fw fa-youtube-play"></i></a>
						<a href="" class="btn btn-social-icon btn-success"><i class="fa fa-fw fa-whatsapp"></i></a>
						<a href="" class="btn btn-social-icon btn-warning"><i class="fa fa-fw fa-instagram"></i></a>
					</div>
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
						<button type="button" class="btn btn-primary">Tambah</button>
						<hr>
						<div class="table-responsive">
							<table class="table table-bordered table-sm" id="myData" width="100%">
								<thead class="thead-dark">
									<tr>
										<th><input type="checkbox" id="checklist"></th>
										<th>Url</th>
										<th>Icon</th>
										<th>Warna</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="data">
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane" id="settings">
						<form id="profil" method="post" class="form-horizontal">
							<div class="form-group">
								<label for="nama" class="col-sm-2 control-label">Nama Sekolah</label>
								<div class="col-sm-10">
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
							<button type="submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Simpan</button>
							<button type="button" id="btn-reset" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i> Reset</button>
						</form>
					</div>
				</div>
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

		function show_data() {
			$.ajax({
				url: '<?= site_url('sekolah/getProfile') ?>',
				type: 'POST',
				dataType: 'json',
				success: function(result) {
					$('[name="nama"]').val(result.nama);
					$('[name="no"]').val(result.nohp);
					$('[name="alamat"]').val(result.alamat);
					$('#reset').html('<img src="<?= base_url() ?>assets/img/profile/' + result.logo + '" alt="Logo Sekolah" id="output" width="200px" height="200px">');
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
						}
					})
					html = '<img class="profile-user-img img-responsive img-circle logo" id="logo" src="<?= base_url() ?>assets/img/profile/' + result.logo + '" alt="Logo Sekolah">' +
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
		$('#btn-reset').click(function() {
			show_data();
		});
		$('profil').submit(function() {
			$.ajax({
				url: '<?= site_url('sekolah/update') ?>',
				type: 'POST',
				data: new FormData(this),
				dataType: 'json',
				contentType: false,
				processData: false,
				async: false,
				success: function(result) {

				}
			})
		})
	})
</script>