<?php
$data_id = $_SESSION["ses_id"];

    if(isset($_GET['kode'])){
    	$sql = $koneksi->query("select * from tb_pengguna where id_pengguna=$data_id");
		while ($data= $sql->fetch_assoc()) {
			$token = $data['token'];
		}

    	if ($token==2) {
    		$sql_simpan = "INSERT INTO tb_vote2 (id_caleg, id_pemilih) VALUES (
	            '".$_GET['kode']."',
	            '".$data_id."');";
	        $token--;
	        $sql_simpan .= "UPDATE tb_pengguna set 
				status2='1',
				token='".$token."'
				WHERE id_pengguna='".$data_id."'";
	        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
			mysqli_close($koneksi);	
    	}
    	elseif ($token == 1) {
    		$sql_simpan = "INSERT INTO tb_vote2 (id_caleg, id_pemilih) VALUES (
	            '".$_GET['kode']."',
	            '".$data_id."');";
	        $token--;
	        $sql_simpan .= "UPDATE tb_pengguna set 
				status2='0',
				token='".$token."'
				WHERE id_pengguna='".$data_id."'";
	        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
			mysqli_close($koneksi);
    	}

		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Anda Berhasil Memilih',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=dt-partai';
				}
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Anda Gagal Memilih',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=dt-partai';
				}
			})</script>";
		  }}
		   //selesai proses simpan data
	  