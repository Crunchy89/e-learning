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
							Access Management
						</h3>
					</div>
					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-sm" id="myData" width="100%">
							<thead class="thead-dark">
								<tr>
									<th>Role</th>
									<?php foreach ($menu as $m) : ?>
										<th><?= $m->title ?></th>
									<?php endforeach; ?>
								</tr>
							</thead>
							<tbody id="data">
								<?php foreach ($role as $r) : ?>
									<tr>
										<th><?= $r->role ?></th>
										<?php foreach ($menu as $m) : ?>
											<td><input type="checkbox" class="cek" data-id_role="<?= $r->id_role ?>" data-id_menu="<?= $m->id_menu ?>" <?php $cek = $this->db->get_where('user_access', ['id_role' => $r->id_role, 'id_menu' => $m->id_menu])->row();
																																						if ($cek) : ?> <?php if ($cek->id_role == 1 && $cek->id_menu == 1) : ?> disabled<?php endif; ?> checked <?php endif; ?>>
											</td>
										<?php endforeach; ?>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function() {
		$('#data').on('click', '.cek', function() {
			id_role = $(this).data('id_role');
			id_menu = $(this).data('id_menu');
			$.ajax({
				url: '<?= site_url('access/aksi') ?>',
				type: 'post',
				data: {
					id_role: id_role,
					id_menu: id_menu
				},
				dataType: 'json',
				success: function(result) {
					if (result == true) {
						$(document).Toasts('create', {
							title: 'Success',
							body: 'Access Diberikan',
							class: 'bg-success mt-4 mr-4'
						});
					} else {
						$(document).Toasts('create', {
							title: 'Success',
							body: 'Access Dihapus',
							class: 'bg-danger mt-4 mr-4'
						});
					}
				}
			})
		})
	})
</script>