<div class="login-box">
	<div class="login-logo">
		<h1>Sistem e-learning SMK Al-Hasanain NU Beraim</h1>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Silahkan Login</p>

			<form id="login" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" name="user" id="user" data-toggle="tooltip" data-placement="left" title="Masukkan Username" placeholder="Username">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-fw fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="pass" id="pass" data-toggle="tooltip" data-placement="left" title="Masukkan Password" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span data-toggle="tooltip" data-placement="right" title="Lihat Password" id="eye" class="fas fa-eye"></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success w-100">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$(function() {
			$('[data-toggle="tooltip"]').tooltip()
		})
		$('#eye').click(function() {
			if ($('#pass').is(':password')) {
				$('#pass').attr('type', 'text');
				$('#eye').removeClass('fa-eye');
				$('#eye').addClass('fa-eye-slash');
			} else {
				$('#pass').attr('type', 'password');
				$('#eye').addClass('fa-eye');
				$('#eye').removeClass('fa-eye-slash');
			}
		});
	});
</script>