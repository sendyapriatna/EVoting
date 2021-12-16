<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_caleg WHERE id_caleg='".$_GET['kode']."'";
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
				<a href="?page=dt-caleg" class="btn btn-secondary btn-sm">
					< Kembali</a>
			</div>
			<br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No Urut</th>
						<th>Nama Kandidat</th>
						<th>Foto Kandidat</th>
						<th>Visi</th>
						<th>Misi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_caleg where id_caleg=$kode");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $data['id_caleg']; ?>
						</td>
						<td>
							<?php echo $data['nama_caleg']; ?>
						</td>
						<td align="center">
							<img src="foto/<?php echo $data['foto_caleg']; ?>" width="150px" />
						</td>
						<td>
							<?php echo $data['visi']; ?>
						</td>
						<td>
							<?php echo $data['misi']; ?>
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