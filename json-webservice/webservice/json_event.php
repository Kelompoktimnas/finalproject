<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "testdb";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
$query = ("SELECT * from tbl_users ");
//echo $query;
$result = mysqli_query($koneksi,$query) or die(mysqli_error());
$arr = array();
while ($row = mysqli_fetch_assoc($result)) {

    $temp = array("userName" => $row["userName"],
     "userProfession" => $row["userProfession"]);

    array_push($arr, $temp);
}

$data = json_encode($arr);
echo "{\"User\":" . $data . "}";
?>