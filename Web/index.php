<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_nama"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nim = $_SESSION["ses_nim"];
	$data_nama = $_SESSION["ses_nama"];
	$data_email = $_SESSION["ses_email"];
	$data_level = $_SESSION["ses_level"];
	$data_status = $_SESSION["ses_status"];
	$data_jenis = $_SESSION["ses_jenis"];
}

//KONEKSI DB
include "inc/koneksi.php";
//FUNGSI RUPIAH
include "inc/rupiah.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>UNS E-voting</title>
	<link rel="icon" href="dist/img/img2.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<!-- Auto Refresh -->
	<script src="jquery-3.1.1.js" type="text/javascript"></script>
	<script>
		setInterval(function() {
			$(".realtime").load("admin/suara/data_suara.php").fadeIn("slow");
		}, 1000);
		setInterval(function() {
			$(".realtime2").load("admin/suara/data_suara2.php").fadeIn("slow");
		}, 1000);
	</script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-yellow navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<b>E-Voting Berbasis Website</b>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<!-- sidebar-dark-primary -->
		<aside class="main-sidebar sidebar-light-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<!-- <img src="dist/img/uns-logo.png" alt="UNS Logo" class="brand-image" style="opacity: .8"> -->
				<img src="dist/img/img2.png" alt="UNS Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text font-weight-light">UNS | E-voting</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img style="margin-top: 15px;" src="dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-cogs"></i>
									<p>
										Kelola Data
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-calon" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Data Kandidat</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-partai" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Data Partai</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-caleg" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Data Caleg</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pemilih" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Data Pemilih</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-edit"></i>
									<p>
										Bilik Suara
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=PsSQAdT" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Bilik Suara Presbem
											</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=dt-partai" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Bilik Suara Caleg
											</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Kotak Suara
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-kotak" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Kotak Suara Presbem
											</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-kotak2" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Kotak Suara Caleg
											</p>
										</a>
									</li>
								</ul>
							</li>
							

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-chart-pie"></i>
									<p>
										Quick Count
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-suara" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Quick Count Presbem
												<!-- <span class="badge badge-warning">
													QC
												</span> -->
											</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-suara2" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Quick Count Caleg
												<!-- <span class="badge badge-warning">
													QC
												</span> -->
											</p>
										</a>
									</li>
								</ul>
							</li>



							<li class="nav-header">Setting</li>
							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Users
									</p>
								</a>
							</li>

						<?php
						} elseif ($data_level == "Petugas") {
						?>

							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-cogs"></i>
									<p>
										Kelola Data
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-calon" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Data Kandidat</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-partai" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Data Partai</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-caleg" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Data Caleg</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-pemilih" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Data Pemilih</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-edit"></i>
									<p>
										Bilik Suara
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=PsSQAdT" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Bilik Suara Presbem
											</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=dt-partai" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Bilik Suara Caleg
											</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Kotak Suara
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-kotak" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Kotak Suara Presbem
											</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-kotak2" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Kotak Suara Caleg
											</p>
										</a>
									</li>
								</ul>
							</li>
							

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-chart-pie"></i>
									<p>
										Quick Count
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-suara2" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Quick Count Presbem
												<!-- <span class="badge badge-warning">
													QC
												</span> -->
											</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-suara2" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Quick Count Caleg
												<!-- <span class="badge badge-warning">
													QC
												</span> -->
											</p>
										</a>
									</li>
								</ul>
							</li>



							<li class="nav-header">Setting</li>
							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Users
									</p>
								</a>
							</li>

						<?php
						} elseif ($data_level == "Pemilih") {
						?>
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-edit"></i>
									<p>
										Bilik Suara
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=PsSQAdT" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Bilik Suara Presbem
											</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=dt-partai" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Bilik Suara Caleg
											</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-chart-pie"></i>
									<p>
										Quick Count
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-suara" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Quick Count Presbem
												<!-- <span class="badge badge-warning">
													QC
												</span> -->
											</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-suara2" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>
												Quick Count Caleg
												<!-- <span class="badge badge-warning">
													QC
												</span> -->
											</p>
										</a>
									</li>
								</ul>
							</li>


							<li class="nav-header">Setting</li>
						<?php
						}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon far fa-circle text-danger"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {
								//Klik Halaman Home Pengguna
							case 'admin':
								include "home/admin.php";
								break;
							case 'petugas':
								include "home/bendahara.php";
								break;
							case 'pemilih':
								include "home/pemilih.php";
								break;

								//Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//calon
							case 'data-calon':
								include "admin/calon/data_calon.php";
								break;
							case 'add-calon':
								include "admin/calon/add_calon.php";
								break;
							case 'edit-calon':
								include "admin/calon/edit_calon.php";
								break;
							case 'del-calon':
								include "admin/calon/del_calon.php";
								break;

								//caleg
							case 'data-caleg':
								include "admin/caleg/data_caleg.php";
								break;
							case 'add-caleg':
								include "admin/caleg/add_caleg.php";
								break;
							case 'edit-caleg':
								include "admin/caleg/edit_caleg.php";
								break;
							case 'del-caleg':
								include "admin/caleg/del_caleg.php";
								break;

								//Pemilih
							case 'data-pemilih':
								include "admin/pemilih/data_pemilih.php";
								break;
							case 'add-pemilih':
								include "admin/pemilih/add_pemilih.php";
								break;
							case 'edit-pemilih':
								include "admin/pemilih/edit_pemilih.php";
								break;
							case 'del-pemilih':
								include "admin/pemilih/del_pemilih.php";
								break;
							case 'satu-pemilih':
								include "admin/pemilih/satu_pemilih.php";
								break;
							case 'nol-pemilih':
								include "admin/pemilih/nol_pemilih.php";
								break;
							case 'satu-pemilih-2':
								include "admin/pemilih/satu_pemilih2.php";
								break;
							case 'nol-pemilih-2':
								include "admin/pemilih/nol_pemilih2.php";
								break;


								//Partai
							case 'data-partai':
								include "admin/partai/data_partai.php";
								break;
							case 'add-partai':
								include "admin/partai/add_partai.php";
								break;
							case 'edit-partai':
								include "admin/partai/edit_partai.php";
								break;
							case 'del-partai':
								include "admin/partai/del_caleg.php";
								break;

								//Bilik suara
							case 'PsSQAdT':
								include "pemilih/calon/data_calon.php";
								break;
							case 'PsSQBpL':
								include "pemilih/calon/pilih_calon.php";
								break;
							case 'PsSQBBK':
								include "pemilih/calon/buka_calon.php";
								break;
							case 'view':
								include "pemilih/calon/view_calon.php";
								break;

								//Bilik suara caleg
							case 'dt-partai':
								include "pemilih/partai/data_partai.php";
								break;
							case 'dt-caleg':
								include "pemilih/caleg/data_caleg.php";
								break;	
							case 'pilih-caleg':
								include "pemilih/caleg/pilih_caleg.php";
								break;
							case 'buka-caleg':
								include "pemilih/caleg/buka_caleg.php";
								break;
							case 'view-caleg':
								include "pemilih/caleg/view_caleg.php";
								break;

								//Kotak suara
							case 'data-kotak':
								include "admin/kotak/data_kotak.php";
								break;
							case 'data-kotak2':
								include "admin/kotak/data_kotak2.php";
								break;
							case 'data-suara':
								include "admin/suara/data_suara.php";
								break;
							case 'data-suara2':
								include "admin/suara/data_suara2.php";
								break;



								//default
							default:
								echo "<center><h1> ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "Pemilih") {
							include "home/pemilih.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
				Copyright &copy;
				<a target="_blank" href="#">
					<strong> XXIVI</strong>
				</a>
				All rights reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>