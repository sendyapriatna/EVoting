<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kandidat Caleg</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-caleg" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No Urut</th>
						<th>Nama Kandidat</th>
						<th>Partai</th>
						<th>Foto Kandidat</th>
						<th>Visi</th>
						<th>Misi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_caleg");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $data['id_caleg']; ?>
						</td>
						<td>
							<?php echo $data['nama_caleg']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
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
						<td>
							<a href="?page=edit-caleg&kode=<?php echo $data['id_caleg']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-caleg&kode=<?php echo $data['id_caleg']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
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