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
	<title>Tambah Daftar Pemain</title>

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
			<h2>Data Pemain Timnas &raquo; Tambah Data</h2>
			<hr /><?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$username = $_POST['user_name'];// user name
		$userjob = $_POST['user_job'];// user email
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($username)){
			$errMSG = "Please Enter Name.";
		}
		else if(empty($userjob)){
			$errMSG = "Please Enter Your Position.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image Profile .";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO tbl_users(userName,userProfession,userPic) VALUES(:uname, :ujob, :upic)');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "Data Baru Berhasil Diinputkan ...";
				header("refresh:5;beranda.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tugas Besar Matkul Aplikasi Mobile dan Pemrograman Web I</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

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


	<div class="page-header">
    	<h1 class="h2">Tambah Daftar Pemain   <a class="btn btn-default" href="beranda.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; Beranda </a></h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Nama Pemain</label></td>
        <td><input class="form-control" type="text" name="user_name" placeholder="Masukan Nama" value="<?php echo $username; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Posisi Pemain</label></td>
        <td><input class="form-control" type="text" name="user_job" placeholder="Posisi" value="<?php echo $userjob; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Foto Profil Pemain</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>



<div class="alert alert-info">
    <strong>Tugas Besar Apk. MObile dan Web</strong> <a href="http://www.codingcage.com/2016/02/Tugas-Besar-Matkul-Aplikasi-Mobile-dan-Pemrograman-Web-I.html">Manajemen Informatika B 2015</a>!
</div>

    

</div>



	


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>