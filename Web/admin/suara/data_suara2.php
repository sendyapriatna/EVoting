<?php
$koneksi = new mysqli ("localhost","id18103347_sndyuns","b5kv4S/=^52Vg{KN","id18103347_db_vote");
?>
<div class="realtime2">
	<div class="card card-info autoload">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-chart-pie"></i> Perolehan Suara Caleg</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No Urut</th>
							<th>Nama Kandidat</th>
							<th>
								<center>Foto Kandidat</center>
							</th>
							<th>Jumlah Suara</th>
						</tr>
					</thead>
					<tbody>

						<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_caleg");
					while ($data= $sql->fetch_assoc()) {

						$id_caleg = $data["id_caleg"];
					?>

						<tr>
							<td>
								<?php echo $data['id_caleg']; ?>
							</td>
							<td>
								<?php echo $data['nama_caleg']; ?>
							</td>
							<td align="center">
								<img src="foto/<?php echo $data['foto_caleg']; ?>" height="150px" />
							</td>
							<td>
								<h4>
									<?php
								$sql_hitung = "SELECT COUNT(id_vote) from tb_vote2  where id_caleg='$id_caleg'";
								$q_hit= mysqli_query($koneksi, $sql_hitung);
								while($row = mysqli_fetch_array($q_hit)) {
								echo $row[0]." Suara";
								}
							?>
								</h4>
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
	</div>