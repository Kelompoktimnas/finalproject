<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Website Data Pemain Timnas</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
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

	<div class="page-header">
    	<h1 class="h2">DAFTAR PEMAIN TIMNAS INDONESIA    <a class="btn btn-default" href="addnew.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Tambah daftar Pemain </a></h1>
	</div>
<div class="container">
		<div class="content">
		  <h2>Data Pemain</h2>
			<hr />
			<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$userName = $_GET['userName'];
				$cek = mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE userName='$userName'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM tbl_users WHERE userName='$userName'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
			
			<form class="form-inline" method="get">
				<div class="form-group">
				  <form name="formcari" method="post" action="search_exe.php">
				  <table width="330" border="0" cellpadding="0">
					<td height="25" colspan="3">
					<strong> Pencarian </strong>
					</td>
					</tr>
					<tr> <td height="31">  Name </td>
					<td> <input type="text" name="filter" width="300" height="25"> </td>
					</tr>
					<td></td>
					<td> <input type="SUBMIT" name="cari" id="cari" value="Cari" > </td>
					</table>
					</form>
				</div>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover" background="grey">
				<tr>
                    <th width="12%">No</th>
					<th width="24%">Nama</th>
					<th width="26%">Posisi</th>
					<th width="23%"></th>
                    <th width="15%">Tools</th>
				</tr>
				<?php
				
				if($filter){
					$sql = mysqli_query($koneksi, "SELECT * FROM tbl_users WHERE userName LIKE '%$filter%' ORDER BY userName ASC");
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM tbl_users ORDER BY userName ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td><a href="profile.php?userName='.$row['userName'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['userName'].'</a></td>
                            <td>'.$row['userProfession'].'</td>
							
							<td>';
						echo '
							</td>
							<td>
								<a href="edit.php?userName='.$row['userName'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&userName='.$row['userName'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['userName'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			<form method="post" action="report_barang_view.php">
  			<table>
  				<tr>
  				<td><input type="submit" name="Submit" value="Tampilkan" /></td>
  			</tr>
  	</table>
  	<p>&nbsp;</p>
  <p>&nbsp; </p>
  <p>&nbsp;</p>
</form>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>