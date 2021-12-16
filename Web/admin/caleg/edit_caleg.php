<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_caleg WHERE id_caleg='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Urut</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_caleg" name="id_caleg" value="<?php echo $data_cek['id_caleg']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Caleg</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_caleg" name="nama_caleg" value="<?php echo $data_cek['nama_caleg']; ?>"
					/>
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
				<label class="col-sm-2 col-form-label">Foto Caleg</label>
				<div class="col-sm-6">
					<input type="file" id="foto_caleg" name="foto_caleg">
					<p class="help-block">
						<font color="red">Format file Jpg"</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="visi" name="visi" value="<?php echo $data_cek['visi']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Misi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="misi" name="misi" value="<?php echo $data_cek['misi']; ?>"
					/>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-caleg" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>


<?php

$sumber = @$_FILES['foto_caleg']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['foto_caleg']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['foto_caleg'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE tb_caleg SET
            nama_caleg='".$_POST['nama_caleg']."',
            nama='".$_POST['partai']."',
            foto_caleg='".$nama_file."',
            visi='".$_POST['visi']."',
            misi='".$_POST['misi']."'
            WHERE id_caleg='".$_POST['id_caleg']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
        $sql_ubah = "UPDATE tb_caleg SET
            nama_caleg='".$_POST['nama_caleg']."',
            nama='".$_POST['partai']."',
            visi='".$_POST['visi']."',
            misi='".$_POST['misi']."'
            WHERE id_caleg='".$_POST['id_caleg']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-caleg';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-caleg';
            }
        })</script>";
    }
}

