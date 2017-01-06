<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Data</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
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
			<h2>Data Pemain Timnas &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$userName = $_GET['userName'];
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE userName='$userName'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: beranda.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$userName		 = $_POST['userName'];
				$userProfession	 = $_POST['userProfession'];
				$userPic		 = $_POST['userPic'];
				
				$update = mysqli_query($koneksi, "UPDATE tbl_users SET userName='$userName', userProfession='$userProfession', userPic='$userPic', status='$status' WHERE userName='$userName'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?userName=".$userName."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Pemain</label>
					<div class="col-sm-4">
						<input type="text" name="userName" value="<?php echo $row ['userName']; ?>" class="form-control" placeholder="userName" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Posisi Pemain</label>
					<div class="col-sm-4">
						<input type="text" name="userProfession" value="<?php echo $row ['userProfession']; ?>" class="form-control" placeholder="userProfession" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Foto Pemain</label>
					<div class="col-sm-4">
						<p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        				<input class="input-group" type="file" name="user_image" accept="image/*" />
					</div>
				</div>
				
				<!--<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" value="<?php //echo $row['username']; ?>" class="form-control" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" value="<?php //echo $row['password']; ?>" class="form-control" placeholder="Password">
					</div>
				</div>-->
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
						<a href="beranda.php" class="btn btn-sm btn-danger">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
</body>
</html>