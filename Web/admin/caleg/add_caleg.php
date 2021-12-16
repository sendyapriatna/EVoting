<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No urut</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="id_caleg" name="id_caleg" placeholder="Nomor Urut" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kandidat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_caleg" name="nama_caleg" placeholder="Nama Caleg">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Kandidat</label>
				<div class="col-sm-6">
					<input type="file" id="foto_caleg" name="foto_caleg">
					<p class="help-block">
						<font color="red">"Format file Jpg"</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Partai</label>
				<div class="col-sm-4">
					<select name="partai" id="partai" class="form-control">
						<option>- Pilih -</option>
						<?php
								$no = 1;
								$sql = $koneksi->query("select * from tb_partai");
								while ($data= $sql->fetch_assoc()) {
								?>

								<tr>
									<td>
										<option><?php echo $data['nama']; ?></option>
									</td>
								</tr>

								<?php
			              }
			            ?>
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="visi" name="visi" placeholder="Visi">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Misi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="misi" name="misi" placeholder="Misi">
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-caleg" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    $sumber = @$_FILES['foto_caleg']['tmp_name'];
    $target = 'foto/';
    $nama_file = @$_FILES['foto_caleg']['name'];
    $pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tb_caleg (id_caleg, nama_caleg, nama, foto_caleg, visi, misi) VALUES (
        '".$_POST['id_caleg']."',
        '".$_POST['nama_caleg']."',
        '".$_POST['partai']."',
        '".$nama_file."',
        '".$_POST['visi']."',
        '".$_POST['misi']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-caleg';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-caleg';
          }
      })</script>";
	}
}elseif(empty($sumber)){
	echo "<script>
	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?page=add-caleg';
		}
	})</script>";
  }
}   
