<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="../asset/internal/css/style_1.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway:700" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="../asset/internal/img/img-local/favv.png">
</head>

<body>
	<div class="loginBox">
		<h1>Masuk</h1>
		<form action="cek_login.php" method="post">
			<div class="inputBox">
				<span><i class="fa fa-user" aria-hidden="true"></i></span>
				<input type="text" name="user" autocomplete="off" placeholder="Masukan nomor induk">
				</input>
			</div>
			<div class="inputBox">
				<span><i class="fa fa-lock" aria-hidden="true"></i></span>
				<input type="password" name="pass" autocomplete="off" placeholder="Masukan password">
				</input>
			</div>
			<input type="submit" name="login" value="Login">
			<br>
			<p>Belum punya akun? Daftar <a href="registrasi.php">disini</a></p>
		</form>
		<!-- <a href="#">Belum punya akun? <span>Daftar disini</span></a> -->
	</div>
</body>

</html>