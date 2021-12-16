<?php

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('PHPMailer/src/Exception.php');
include('PHPMailer/src/PHPMailer.php');
include('PHPMailer/src/SMTP.php');
include "inc/koneksi.php";

//Load Composer's autoloader
require 'vendor/autoload.php';
if (isset($_POST['btnLogin'])) {
    $nim = $_POST['nim'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];

    //mulai proses simpan data
    $pass_acak = mt_rand(100000, 999999);

    //Validasi Menggunakan Nim dan Nama
    //$cek = mysqli_query($koneksi, "SELECT nim FROM tb_pengguna WHERE nim = '$nim' AND nama_pengguna like'%" . $nama_pengguna . "%'");
    
    //Validasi Menggunakan Nim
    $cek = mysqli_query($koneksi, "SELECT nim FROM tb_pengguna WHERE nim = '$nim'");
    $data = mysqli_num_rows($cek);

    if ($data > 0) {


        $sql_simpan = "UPDATE tb_pengguna SET password='$pass_acak',email='$email', prodi='$prodi' WHERE nim = '$nim'";
        mysqli_query($koneksi, $sql_simpan);
        //Instantiation and passing `true` enables exceptions
        if (($sql_simpan)) {
            $email_pengirim = 'kpufpuns2021@gmail.com';
            $nama_pengirim = 'ADMIN KPU FP UNS';
            $penerima = $_POST['email'];
            $subject = 'Terima Kasih atas ';
            $pesan = 'Hi,' . $nama_pengguna . '<br>Selamat anda berhasil daftar<br> Kode OTP anda :<h4>' . $pass_acak . '</h4><br><b>Masukan Kode OTP saat login!</b>';


            $mail = new PHPMailer;
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->Username   = 'kpufpuns2021@gmail.com';               //SMTP username
            $mail->Password   = 'jjezthllojslpabp';                     //SMTP password
            $mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->SMTPDebug  = 2;                                      //Enable verbose debug output

            //Recipients
            $mail->setFrom($email_pengirim, $nama_pengirim);
            $mail->addAddress($penerima);     //Add a recipient
            $mail->addReplyTo($email_pengirim, $nama_pengirim);

            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $pesan;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if ($mail->send()) {
                echo "<script>alert('Check Your Email!')
            document.location = 'login.php'</script>";
            } else {
                echo "<script>alert('Error!')</script>";
                echo "<meta http-equiv='refresh' content='0; url=register.php'>";
            }
        }
    } else {
        echo "<script>
        alert('Nim anda tidak tersedia! CP Panitia : ')
        document.location = 'register.php'
            </script>";
        return false;
    }
}


?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UNS E-voting</title>
    <link rel="icon" href="dist/img/img2.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="row justify-content-center text-center">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="dist/img/uns-logo.png" width=170px />
                    </div>
                    <div class="carousel-item">
                        <img src="dist/img/img2.png" width=170px />
                    </div>
                </div>
                <h3>E-Voting UNS</h3>
            </div>
        </div>
        <div class="row justify-content-center text-center">

            <div class="col-sm-12 justify-content-center text-center">
                <div class="">
                    <div class="">
                        <h3 class="">Register</h3>
                        <br>
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span style="width: 15px" class="fas fa-hashtag"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="nim" placeholder="Nim" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span style="width: 15px" class="fas fa-user"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="nama_pengguna" placeholder="Nama" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span style="width: 15px" class="fas fa-graduation-cap"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="prodi" placeholder="Prodi" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span style="width: 15px" class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-warning btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
                                        <b>Register</b>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <div class="row text-center">
                                    <p style="margin: 20px 0 0 0;">Already have an account? <a href="login.php">Login</a></p>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Alert -->
    <script src="plugins/alert.js"></script>
    <!-- Boostrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>