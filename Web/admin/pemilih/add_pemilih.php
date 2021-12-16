<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('PHPMailer/src/Exception.php');
include('PHPMailer/src/PHPMailer.php');
include('PHPMailer/src/SMTP.php');
//membuat acak angka
$pass_acak = mt_rand(100000, 999999);
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nim</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Nim" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pemilih</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama user" required>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Prodi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div </div>
            <div class="card-footer">
                <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                <a href="?page=data-pemilih" title="Kembali" class="btn btn-secondary">Batal</a>
            </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
    //mulai proses simpan data
    $sql_simpan = "INSERT INTO tb_pengguna (nim,nama_pengguna,prodi,email,password,level,status,jenis) VALUES (
        '" . $_POST['nim'] . "',
        '" . $_POST['nama_pengguna'] . "',
        '" . $_POST['prodi'] . "',
        '" . $_POST['email'] . "',
        '" . $pass_acak . "',
        'Pemilih',
        '1',
        'PST')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {

        //Script Kirim OTP
        //   $email_pengirim = 'kyubean7@gmail.com';
        //   $nama_pengirim = 'admin';
        //   $penerima = $_POST['email'];
        //   $subject = 'Registration New User';
        //   $pesan = 'Selamat anda berhasil daftar<br> Kode OTP anda :<p style="color=blue">' . $pass_acak . '</p>Masukan Kode OTP saat login!';


        //   $mail = new PHPMailer;
        //   $mail->isSMTP();                                            //Send using SMTP
        //   $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        //   $mail->Username   = 'kyubean7@gmail.com';                     //SMTP username
        //   $mail->Password   = 'udmuoagmivygugju';                               //SMTP password
        //   $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        //   $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //   $mail->SMTPDebug  = 2;                      //Enable verbose debug output

        //   //Recipients
        //   $mail->setFrom($email_pengirim, $nama_pengirim);
        //   $mail->addAddress($penerima);     //Add a recipient
        //   $mail->addReplyTo($email_pengirim, $nama_pengirim);

        //   //Attachments
        //   $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //   //Content
        //   $mail->isHTML(true);                                  //Set email format to HTML
        //   $mail->Subject = $subject;
        //   $mail->Body    = $pesan;
        //   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        //   if ($mail->send()) {
        //       echo "<script>
        // Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        // }).then((result) => {if (result.value){
        //     window.location = 'index.php?page=data-pemilih';
        //     }
        // })</script>";
        //   } else {
        //       echo "<script>alert('Error!')</script>";
        //       echo "<meta http-equiv='refresh' content='0; url=register.php'>";
        //   }
        echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pemilih';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pemilih';
          }
      })</script>";
    }
}
     //selesai proses simpan data
