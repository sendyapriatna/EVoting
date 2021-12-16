<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		
		$kode=$_GET['kode'];
    }
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kandidat</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=PsSQAdT" class="btn btn-secondary btn-sm">
					< Kembali</a>
			</div>
			<br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>
							<center>Kandidat Pilihan Anda</center>
						</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$sql = $koneksi->query("select * from tb_calon where id_calon=$kode");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td align="center">
							<h1>
								<?php echo $data['id_calon']; ?>
							</h1>
							<br>
							<img src="foto/<?php echo $data['foto_calon']; ?>" width="400px" />
							<br>
							<h2>
								<?php echo $data['nama_calon']; ?>
							</h2>
							<br>
							<a href="?page=PsSQBpL&kode=<?php echo $data['id_calon']; ?>" class="btn btn-primary">
								<i class="fa fa-edit"></i> Tetapkan Pilihan
							</a>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->