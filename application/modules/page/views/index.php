<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>403 forbidden</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
</head>
<style>
	* {
		margin: 0;
		padding: 0;
	}

	body {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 600px;
	}

	.kotak {
		position: relative;
		width: 70%;
		min-width: 200px;
		height: 300px;
		background-color: rgba(0, 0, 0, 0.8);
		border-radius: 10px;
		display: flex;
		justify-content: space-around;
		align-items: center;
		flex-wrap: wrap;
	}

	.box {
		position: relative;
		width: 50%;
		display: flex;
		flex-direction: column;
		flex-wrap: wrap;
		justify-content: center;
		align-content: center;
		align-items: center;
	}
</style>

<body>
	<div class="kotak">
		<div class="box">
			<i style="color: white" class="fas fa-8x fa-lock"></i>
		</div>
		<div class="box">
			<h1 style="color: white">403 Lockdown Corona</h1>
			<h4><a style="color: aqua" href="<?= site_url('admin') ?>">Diem di rumah aja</a></h6>
		</div>
	</div>
</body>

</html>