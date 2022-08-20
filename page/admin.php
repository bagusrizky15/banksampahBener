<?php
session_start();
if (empty($_SESSION['user']) && empty($_SESSION['pass'])) {
	header('location:login.php');
} else {
	error_reporting(E_ALL | E_STRICT);
	include_once("../system/config/koneksi.php");
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<!-- <link rel="stylesheet" href="../asset/internal/css/style_2.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway:700" rel="stylesheet">
	<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
	<link rel="shortcut icon" href="../asset/internal/img/img-local/favv.png">
	<!-- MDB -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet" />

	<style>
		@media (min-width: 991.98px) {
			main {
				padding-left: 240px;
			}
		}

		/* Sidebar */
		.sidebar {
			position: fixed;
			top: 0;
			bottom: 0;
			left: 0;
			padding: 58px 0 0;
			/* Height of navbar */
			box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
			width: 240px;
			z-index: 600;
		}

		@media (max-width: 991.98px) {
			.sidebar {
				width: 100%;
			}
		}

		.sidebar .active {
			border-radius: 5px;
			box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
		}

		.sidebar-sticky {
			position: relative;
			top: 0;
			height: calc(100vh - 48px);
			padding-top: 0.5rem;
			overflow-x: hidden;
			overflow-y: auto;
			/* Scrollable contents if viewport is shorter than content. */
		}

		button {
			height: 27px;
			width: 85px;
			background: #50AF5D;
			border-radius: 5px;
			color: #fff;
			font-family: Montserrat;
		}

		.sidebar ul li {
			background-color: #50AF5D;
			margin: 10px 0;

		}

		.sidebar ul li a {
			color: white;
		}
	</style>
</head>

<body>

	<?php
		$cek = mysqli_query($conn, "SELECT * FROM admin WHERE nia='" . $_SESSION['nia'] . "'");
		$row = mysqli_fetch_array($cek);
		?>

	<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" style="background-color: #50AF5D;">
		<div class="position-sticky">
			<div class="list-group list-group-flush mx-3 mt-4">
				<ul id="collapseExample1" class="collapse show list-group list-group-flush">
					<li class="list-group-item py-1">
						<a href="admin.php?page=data-admin"
							style="text-align: center; padding: 30px 0 30px 0; font-size: 20px;"><?php echo $_SESSION["level"]; ?>,
							<br> <?php echo $row['nama'] ?></a>
					</li>
					<?php
						$level = $_SESSION['level'] == 'Admin';
						if ($level) {
						} else {
						?>
					<li class="list-group-item py-1">
						<a href="admin.php?page=data-admin-full"><span class="fa fa-user" aria-hidden="true"></span>
							Data Admin</a>
					</li>
					<?php } ?>

					<li class="list-group-item py-1">
						<a href="admin.php?page=data-nasabah-full"><span class="fa fa-users" aria-hidden="true"></span>
							Data Nasabah</a>
					</li class="list-group-item py-1">

					<li class="list-group-item py-1">
						<a href="admin.php?page=data-sampah"><span class="fa fa-trash" aria-hidden="true"></span> Data
							Sampah</a>
					</li>

					<li class="list-group-item py-1">
						<a href="admin.php?page=data-setor"><span class="fa fa-handshake" aria-hidden="true"></span>
							Transaksi Setor</a>
					</li>

					<li class="list-group-item py-1">
						<a href="admin.php?page=data-tarik"><span class="fa fa-handshake" aria-hidden="true"></span>
							Transaksi Tarik</a>
					</li>

					<li class="list-group-item py-1">
						<a href="admin.php?page=data-report"><span class="fa fa-line-chart" aria-hidden="true"></span>
							Grafik Monitoring</a>
					</li>

					<li class="list-group-item py-1">
						<a href="logout.php"><span class="fa fa-sign-out" aria-hidden="true"></span> Logout</a>
					</li>
				</ul>

				<!-- Collapse 2 -->
				<ul id="collapseExample2" class="collapse list-group list-group-flush">
					<li class="list-group-item py-1">
						<a href="admin.php?page=data-admin"
							style="text-align: center; padding: 30px 0 30px 0; font-size: 20px;"><?php echo $_SESSION["level"]; ?>,
							<br> <?php echo $row['nama'] ?></a>
					</li>
					<?php
						$level = $_SESSION['level'] == 'Admin';
						if ($level) {
						} else {
						?>
					<li class="list-group-item py-1">
						<a href="admin.php?page=data-admin-full"><span class="fa fa-user" aria-hidden="true"></span>Data
							Admin</a>
					</li>
					<?php } ?>

					<li class="list-group-item py-1">
						<a href="admin.php?page=data-nasabah-full"><span class="fa fa-users"
								aria-hidden="true"></span>Data Nasabah</a>
					</li class="list-group-item py-1">

					<li class="list-group-item py-1">
						<a href="admin.php?page=data-sampah"><span class="fa fa-trash" aria-hidden="true"></span>Data
							Sampah</a>
					</li>

					<li class="list-group-item py-1">
						<a href="admin.php?page=data-setor"><span class="fa fa-handshake-o"
								aria-hidden="true"></span>Transaksi Setor</a>
					</li>

					<li class="list-group-item py-1">
						<a href="admin.php?page=data-tarik"><span class="fa fa-handshake-o"
								aria-hidden="true"></span>Transaksi Tarik</a>
					</li>

					<li class="list-group-item py-1">
						<a href="admin.php?page=data-report"><span class="fa fa-line-chart"
								aria-hidden="true"></span>Grafik Monitoring</a>
					</li>

					<li class="list-group-item py-1">
						<a href="logout.php"><span class="fa fa-sign-out" aria-hidden="true"></span>Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>


	<!-- Navbar -->
	<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #50AF5D;">
		<!-- Container wrapper -->
		<div class="container-fluid mx-3">
			<!-- Toggle button -->
			<button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
				aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
			</button>

			<!-- Brand -->
			<span class="navbar-brand text-white">Dashboard</span>

			<!-- Right links -->
			<ul class="navbar-nav ms-auto d-flex flex-row">

			</ul>
		</div>
		<!-- Container wrapper -->
	</nav>
	<!-- Navbar -->

	<main class="ms-5" style="margin-top: 75px">
		<?php
			if (isset($_GET['page'])) {
				$page = $_GET['page'];

				switch ($page) {
					case 'data-admin':
						include "../system/function/view-admin.php";
						break;
					case 'tambah-data-admin':
						include "../system/function/tambah-admin.php";
						break;
					case 'data-admin-full':
						include "../system/function/view-admin-full.php";
						break;
					case 'edit-admin-id':
						include "../system/function/edit-admin-id.php";
						break;
					case 'edit-admin':
						include "../system/function/edit-admin.php";
						break;
					case 'edit-sampah':
						include "../system/function/edit-sampah.php";
						break;
					case 'data-nasabah-full':
						include "../system/function/view-nasabah-full.php";
						break;
					case 'edit-nasabah-id':
						include "../system/function/edit-nasabah-id.php";
						break;
					case 'tambah-data-nasabah':
						include "../system/function/tambah-nasabah.php";
						break;
					case 'data-sampah':
						include "../system/function/view-sampah.php";
						break;
					case 'tambah-data-setor':
						include "../system/function/tambah-setor.php";
						break;
					case 'edit-setor':
						include "../system/function/edit-setor.php";
						break;
					case 'tambah-data-tarik':
						include "../system/function/tambah-tarik.php";
						break;
					case 'data-setor':
						include "../system/function/view-setor.php";
						break;
					case 'data-tarik':
						include "../system/function/view-tarik.php";
						break;
					case 'data-report':
						include "../system/function/view-report.php";
						break;
					case 'tambah-data-sampah':
						include "../system/function/tambah-sampah.php";
						break;
						case 'tambah-data-sampah-baru':
							include "../system/function/tambah-sampah-new.php";
							break;
					default:
						echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
						break;
				}
			} else {
				include "../system/function/view-admin.php";
			}

			?>
	</main>

	<!-- MDB -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
</body>

</html>
<?php } ?>