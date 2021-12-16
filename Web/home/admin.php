<?php
  $sql = $koneksi->query("SELECT COUNT(ID_CALON) as tot_calon  from tb_calon");
  while ($data= $sql->fetch_assoc()) {
    $calon=$data['tot_calon'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as tot_pemilih  from tb_pengguna where level='Pemilih'");
  while ($data= $sql->fetch_assoc()) {
    $pemilih=$data['tot_pemilih'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as sudah  from tb_pengguna where level='Pemilih' and status='0'");
  while ($data= $sql->fetch_assoc()) {
    $sudah=$data['sudah'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as belum  from tb_pengguna where level='Pemilih' and status='1'");
  while ($data= $sql->fetch_assoc()) {
    $belum=$data['belum'];
  }

  $sql2 = $koneksi->query("SELECT COUNT(ID_CALEG) as tot_caleg  from tb_caleg");
  while ($data2= $sql2->fetch_assoc()) {
    $caleg=$data2['tot_caleg'];
  }

  $sql2 = $koneksi->query("SELECT COUNT(id_pengguna) as tot_pemilih  from tb_pengguna where level='Pemilih'");
  while ($data2= $sql2->fetch_assoc()) {
    $pemilih2=$data2['tot_pemilih'];
  }

  $sql2 = $koneksi->query("SELECT COUNT(id_pengguna) as sudah  from tb_pengguna where level='Pemilih' and status2='0'");
  while ($data2= $sql2->fetch_assoc()) {
    $sudah2=$data2['sudah'];
  }

  $sql2 = $koneksi->query("SELECT COUNT(id_pengguna) as belum  from tb_pengguna where level='Pemilih' and status2='1'");
  while ($data2= $sql2->fetch_assoc()) {
    $belum2=$data2['belum'];
  }

?>

<!-- Dashboard Presbem -->
<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<!-- <div class="small-box bg-info"> -->
		<div class="small-box bg-secondary">
			<div class="inner">
				<h5>
					<?php echo $calon; ?>
				</h5>

				<p>Jumlah Kandidat Presbem</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=data-calon" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<!-- <div class="small-box bg-success"> -->
		<div class="small-box bg-info">
			<div class="inner">
				<h5>
					<?php echo $pemilih; ?>
				</h5>

				<p>Jumlah Pemilih Presbem</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=data-pemilih" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<!-- <div class="small-box bg-warning"> -->
		<div class="small-box bg-success">
			<div class="inner">
				<h5>
					<?php echo $sudah; ?>
				</h5>

				<p>Sudah Memilih Presbem</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=nol-pemilih" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<!-- <div class="small-box bg-danger"> -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h5>
					<?php echo $belum; ?>
				</h5>

				<p>Belum Memlih Presbem</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=satu-pemilih" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>

<!-- Dashboard Caleg -->
<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<!-- <div class="small-box bg-info"> -->
		<div class="small-box bg-secondary">
			<div class="inner">
				<h5>
					<?php echo $caleg; ?>
				</h5>

				<p>Jumlah Kandidat Caleg</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=data-caleg" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<!-- <div class="small-box bg-success"> -->
		<div class="small-box bg-info">
			<div class="inner">
				<h5>
					<?php echo $pemilih2; ?>
				</h5>

				<p>Jumlah Pemilih Caleg</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="?page=data-pemilih" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<!-- <div class="small-box bg-warning"> -->
		<div class="small-box bg-success">
			<div class="inner">
				<h5>
					<?php echo $sudah2; ?>
				</h5>

				<p>Sudah Memilih Caleg</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=nol-pemilih-2" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<!-- <div class="small-box bg-danger"> -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h5>
					<?php echo $belum2; ?>
				</h5>

				<p>Belum Memlih Caleg/p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="?page=satu-pemilih-2" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>