<?php
session_start();
ini_set("display_errors",0);
$user = $_SESSION['username'];
	if ($user == ""){
		echo"<script>
		window.location = 'index.php';
		</script>";
	}
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil Pemain Timnas</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <a class="navbar-brand" href="http://bola.okezone.com/read/2016/11/17/51/1543805/daftar-22-pemain-timnas-indonesia-di-piala-aff-2016" title='timnas indonesia'>Timnas Indonesia</a>
            <a class="navbar-brand" href="http://jti.polije.ac.id/?page_id=21">MIF</a>
            <a class="navbar-brand" href="http://www.polije.ac.id/id/">POLIJE</a>
            <a class="navbar-brand" href="http://www.polije.ac.id/id/berita/589-tim-robot-polije-raih-prestasi-dengan-strategi-terbaik.html">2015</a>
        </div>
 
    </div>
</div>
	<div class="container">
		<div class="content">
			<h2>Data Pemain Timnas</h2>
			<hr />
			
			<?php
			$userName = $_GET['userName'];
			
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE userName='$userName'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: beranda.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM tbl_users WHERE userName='$userName'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>';
                    header("refresh:5;beranda.php");
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>';
				}
			}
			?>
			
			<table class="table table-striped table-condensed">
				<tr>
					<th>Nama Pemain</th>
					<td><?php echo $row['userName']; ?></td>
				</tr>
				<tr>
					<th>Posisi</th>
					<td><?php echo $row['userProfession']; ?></td>
				</tr>
				<tr>
					<th>Foto Pemain</th><br>
					<td><img src="user_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="250px" height="250px" />
				</tr>
			</table>
			
			<a href="beranda.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Kembali</a>
			<a href="edit.php?userName=<?php echo $row['userName']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile.php?aksi=delete&userName=<?php echo $row['userName']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['nama']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>