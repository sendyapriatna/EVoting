<?php

	$data_id = $_SESSION["ses_id"];

	$sql = $koneksi->query("select * from tb_pengguna where id_pengguna=$data_id");
	while ($data= $sql->fetch_assoc()) {

	$status=$data['status'];

}
?>

<?php if($status==1){ ?>

<div class="row">
	<tbody>

		<?php
		$sql = $koneksi->query("select * from tb_calon");
		while ($data= $sql->fetch_assoc()) {
		?>
		<!-- Profile Image -->

		<div class="col-md-4">
			<div class="card card-primary card-outline">
				<div class="card-body">
					<h4 class="profile-username text-center">
						<?php echo "Calon " . $data['id_calon']; ?>
					</h4>
					<div class="text-center">
						<img src="foto/<?php echo $data['foto_calon']; ?>" height="235px" />
					</div>

					<h3 class="profile-username text-center">
						<?php echo $data['nama_calon']; ?>
					</h3>

					<center>
						<a href="?page=view&kode=<?php echo $data['id_calon']; ?>" class="btn btn-success btn-sm">
							<i class="fa fa-file"></i> Detail
						</a>
						<a href="?page=PsSQBBK&kode=<?php echo $data['id_calon']; ?>" class="btn btn-primary">
							<i class="fa fa-edit"></i> Pilih
						</a>
					</center>
				</div>
			</div>
		</div>

		<!-- /.card -->
		<?php
              }
            ?>
	</tbody>
</div>

<!-- /.card-body -->
<?php }elseif ($status==0) { ?>

<div class="alert alert-info alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4>
		<i class="icon fas fa-info"></i>Info</h4>
	<h3>Anda sudah menggukan Hak Suara dengan baik, Terimakasih.</h3>
</div>

<?php }  