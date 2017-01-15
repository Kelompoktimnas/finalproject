<?php
//ini_set("display_errors",0);
include("koneksi.php");
$username = $_POST['u'];
$password = $_POST['p'];
//$sql = mysql_query("select * from user where username = '$username'");
//$i=1;
//while ($data = mysql_fetch_array($sql)){
//$user = $data['username'];
//$pass = $data['password'];
//$hak_akses = $data['hak_akses'];
//$i++;
//}
//if($username == ""){
//echo "<script>
	//  alert('Login Gagal');
	  //window.location = 'index.php';
	  //</script>
	  //";
//}

if (($username == "admin" ) && ($password == "admin" )){
session_start();
	$_SESSION['username']=$username;
	//$_SESSION['hak_akses'] = $hak_akses;
	
echo "<script>
	  alert('Login sukses');
	  window.location = 'beranda.php';
	  </script>
	  ";
}else{
echo "<script>
	  alert('Login Gagal');
	  window.location = 'index.php';
	  </script>
	  ";
}
?>