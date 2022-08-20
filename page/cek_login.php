<?php
include '../system/config/koneksi.php';
if (isset($_POST['login'])) {
	$user = mysqli_real_escape_string($conn, $_POST['user']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);


	$data_admin = mysqli_query($conn, "SELECT * FROM admin WHERE nia = '$user' AND password = '$pass'");
	$a = mysqli_fetch_array($data_admin);

	// admin
	$email_a = $a['email'];
	$password_a = $a['password'];
	$level = $a['level'];
	$nama_a = $a['nama'];
	$telepon_a = $a['telepon'];
	$nia = $a['nia'];
	$cek_admin = mysqli_num_rows($data_admin);

	if ($user == "" || $pass == "") {
		echo "
				<script>
					alert('nia dan Password tidak boleh kosong!');
					document.location.href ='login.php';
				</script>
				";
	} else {
		if ($cek_admin > 0) {
			session_start();
			$_SESSION['level'] = $level;
			$_SESSION['nama'] = $nama_a;
			$_SESSION['email'] = $email_a;
			$_SESSION['pass'] = $password_a;
			$_SESSION['telepon'] = $telepon_a;
			$_SESSION['nia'] = $nia;
			echo "
				<script>
					alert('Selamat Anda berhasil login!');
					document.location.href ='admin.php';
				</script>
				";
		} else {
			echo "
				<script>
					alert('Maaf nia dan password tidak valid!');
					document.location.href ='login.php';
				</script>
				";
		}
	}
} else {
	header('location:login.php');
}
