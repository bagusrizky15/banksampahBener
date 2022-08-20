<?php

 require_once("../system/config/koneksi.php");

    $no = mysqli_query($conn, "SELECT nia FROM admin ORDER BY nia DESC");
    $nia = mysqli_fetch_array($no);
    $kode = $nia['nia'];

    $urut = substr($kode, 7, 2);
    $tambah = (int) $urut + 1;
    $bln = date("m");
    $thn = date("y");

    if(strlen($tambah) == 1){
        $format = "admin"."0".$tambah;
    }else{
        $format = "admin".$tambah;
    }

    if(isset($_POST['daftar'])){
      $nia = $_POST['nia'];
      $nama = $_POST['nama'];
      $telepon = $_POST['telepon'];
      $password = $_POST['password'];
      $level = $_POST['level'];

      $sql = mysqli_query($conn, "SELECT * FROM admin WHERE nia = '$nia'");

      if (mysqli_fetch_array($sql) > 0) {
        echo "<script>
                alert('Maaf akun sudah terdaftar!');
              </script>";

              echo "<meta http-equiv='refresh'
              content='0; url=http://localhost:8080/bsk09/page/registrasi.php'>";

              return FALSE;      
      }

      mysqli_query($conn, "INSERT INTO admin VALUES ('$nia','$nama','$telepon','$password','$level')");

      echo "<script>
                alert('Selamat Pendaftaran Berhasil. Silahkan Login');
              </script>";

      echo "<meta http-equiv='refresh'
      content='0; url=http://localhost:8080/bsk09/page/login.php'>";
    }
 ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Daftar</title>
	<link rel="stylesheet" href="../asset/internal/css/style_1.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway:700" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="../asset/internal/img/img-local/favv.png">
	<script type="text/javascript">
		function cek_data() {
			var x = daftar_user.nama.value;
			var x1 = parseInt(x);

			if (x == "") {
				alert("Maaf harap input nama admin!");
				daftar_user.nama.focus();
				return false;
			}
			if (isNaN(x1) == false) {
				alert("Maaf nama harus di input huruf!");
				daftar_user.nama.focus();
				return false;
			}
			var x = daftar_user.telepon.value;
			var angka = /^[0-9]+$/;

			if (x == "") {
				alert("Maaf harap input nomor telepon!");
				daftar_user.telepon.focus();
				return false;
			}
			if (!x.match(angka)) {
				alert("Maaf nomor telepon harus di input angka!");
				daftar_user.telepon.focus();
				return false;
			}
			if (x.length < 10) {
				alert("Nomor telepon minimal 10 karakter");
				daftar_user.telepon.focus();
				return false;
			}

			var y = daftar_user.password.value;
			var panjang = x.length;

			if (y == "") {
				alert("Maaf harap input password!");
				daftar_user.password.focus();
				return false;
			}
			if (panjang < 5 || panjang > 20) {
				alert("Password di input minimum 5 karakter dan maksimum 20 karakter!");
				daftar_user.password.focus();
				return false;
			}
			var p = daftar_user.level.value;
			if (p == "p") {
				alert("Maaf harap input level admin!");
				return (false);
			} else {
				confirm("Apakah Anda yakin sudah input data dengan benar?");
			}
			return true;
		}
	</script>

</head>

<body>
	<div class="loginBox">
		<h1>Daftar</h1>
		<form id="daftar_user" action="" method="post" onsubmit="return cek_data()">
			<div class="inputBox">
				<label class="left">Username</label>
				<input type="text" name="nia" value="<?php echo $format; ?>">
				</input>
			</div>
			<div class="inputBox">
				<label class="left">Nama Admin</label>
				<input type="text" name="nama" placeholder="Masukan nama admin" />
			</div>
			<div class="inputBox">
				<label class="">Nomor Telepon</label>
				<input type="text" placeholder="Masukan nomor telepon" name="telepon" />
			</div>
			<div class="inputBox">
				<label class="">Password</label>
				<input type="password" placeholder="Masukan password" name="password" />

			</div>
			<div class="inputBox">
				<label class="">Level</label>
				<select name="level">
					<option value="p">---Pilih Level---</option>
					<option value="Admin">Admin</option>
				</select>
			</div>
			<br>
			<br>
			<input type="submit" name="daftar" value="Daftar">
			<br>
			<p>Sudah punya akun? Masuk <a href="login.php">disini</a></p>
		</form>
		<!-- <a href="#">Belum punya akun? <span>Daftar disini</span></a> -->
	</div>
</body>

</html>