<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Web Managemen Gudang | Login</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/dist/img/');?>apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/dist/img/');?>favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/dist/img/');?>favicon-16x16.png">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= site_url('assets/') ?>/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= site_url('assets/') ?>https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= site_url('assets/') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= site_url('assets/') ?>/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<img src="<?= base_url('assets/dist/img/gudang_septau_logo.png') ?>" class="rounded" alt="User Image" width="300px" height="300px" />
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in</p>
				<?= $this->session->flashdata('message'); ?>

				<form action="<?= base_url('Auth/proses') ?>" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Username" name="username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" name="password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<br>
				<center>
					<p>Edited by Team Informatika 15.4B.07</p>
				</center>

			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= site_url('assets/') ?>/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= site_url('assets/') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= site_url('assets/') ?>/dist/js/adminlte.min.js"></script>

</body>

</html>
