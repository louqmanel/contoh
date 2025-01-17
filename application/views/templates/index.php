<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Web Managemen Gudang</title>
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/dist/img/');?>apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/dist/img/');?>favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/dist/img/');?>favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/datatables.bootstrap4.min.css" />
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/jqvmap/jqvmap.min.css" />
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css" />
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.css" />

	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.css" />
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?php echo base_url() ?>" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li>
			</ul>


		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
				<div class="text-center"><img src="<?= base_url('assets/dist/img/gudang_septau_logo.png') ?>" class="rounded" alt="User Image" height="80px" /></div>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('assets/dist/img/admin_avatar.png') ?>" class="img-circle elevation-2" alt="User Image" />
					</div>
					<div class="info">
						<a href="#" class="d-block"><?= $this->session->userdata('nama') ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
						<li class="nav-item has-treeview">
							<a <?= $this->uri->segment(1) == null ? 'class="nav-link active"' : '' ?><?= $this->uri->segment(1) == 'dashboard' ? 'class="nav-link active"' : '' ?> href="<?= base_url('dashboard') ?>" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a <?= $this->uri->segment(1) == 'supplier' ? 'class="nav-link active"' : '' ?>href="<?= base_url('supplier') ?>" class="nav-link">
								<i class="nav-icon fas fa-people-arrows"></i>
								<p>
									Supplier
								</p>
							</a>
						</li>
						<li <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'item' || $this->uri->segment(1) == 'color' ? 'class="nav-item has-treeview active menu-open"' : '' ?> class="nav-item has-treeview active">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-store"></i>
								<p>
									Product
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a <?= $this->uri->segment(1) == 'item' ? 'class="nav-link active"' : '' ?>href="<?= base_url('item') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Product Item</p>
									</a>
								</li>
								<li class="nav-item">
									<a <?= $this->uri->segment(1) == 'category' ? 'class="nav-link active"' : '' ?>href="<?= base_url('category') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Category</p>
									</a>
								</li>
								<li class="nav-item">
									<a <?= $this->uri->segment(1) == 'color' ? 'class="nav-link active"' : '' ?>href="<?= base_url('color') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Color</p>
									</a>
								</li>
								<li class="nav-item">
									<a <?= $this->uri->segment(1) == 'bahan' ? 'class="nav-link active"' : '' ?>href="<?= base_url('bahan') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Bahan</p>
									</a>
								</li>
							</ul>
						</li>
						<li <?= $this->uri->segment(1) == 'stock' || $this->uri->segment(1) == 'stockOut' ? 'class="nav-item has-treeview active menu-open"' : '' ?>class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-shopping-cart"></i>
								<p>
									Transaction
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a <?= $this->uri->segment(1) == 'stock' ? 'class="nav-link active"' : '' ?> href="<?= base_url('stock') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Stock In</p>
									</a>
								</li>
								<li class="nav-item">
									<a <?= $this->uri->segment(1) == 'stockOut' ? 'class="nav-link active"' : '' ?> href="<?= base_url('stockOut') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Stock Out</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item">
							<a href="<?= base_url('user') ?>" class="nav-link">
								<i class="fas fa-users nav-icon"></i>
								<p>Users</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('auth/logout') ?>" class="nav-link">
								<i class="fas fa-sign-out-alt nav-icon"></i>
								<p>LogOut</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="https://www.gudangsepatu.com" class="nav-link">
								<i class="fab fa-chrome nav-icon"></i>
								<p> Web Utama</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?= $contents ?>
		</div>


		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<strong>Copyright &copy; 2020
				<a href="#">AM Production</a>.</strong>
			All rights reserved. | Edited by Team Informatika 15.4B.07

			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 1.5 -- Team Informatika 15.4B.07
			</div>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge("uibutton", $.ui.button);
	</script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="<?= base_url('assets/') ?>plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="<?= base_url('assets/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?= base_url('assets/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?= base_url('assets/') ?>dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>

	<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>


	<script>
		$(document).ready(function() {
			$(document).on('click', '#select', function() {
				var id_item = $(this).data('id');
				var barcode = $(this).data('barcode');
				var name = $(this).data('name');
				var unit_name = $(this).data('unit');
				var stock = $(this).data('stock');
				$('#id_item').val(id_item);
				$('#barcode').val(barcode);
				$('#item_name').val(name);
				$('#unit_name').val(unit_name);
				$('#stock').val(stock);
				$('#modalItem').modal('hide');
			})
		})
	</script>
	<script>
		$(document).ready(function() {
			$('#table1').dataTable()
		})
	</script>
	<script>
		$(document).ready(function() {
			$('.table2').dataTable()
		})
	</script>
</body>

</html>
