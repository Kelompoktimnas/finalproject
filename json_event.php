<?php
//include ('../inc/koneksi.php');
mysql_connect("localhost", "root", "");
/* pilih databasenya */
mysql_select_db("testdb");

$query = "SELECT * from userName ";
//echo $query;
$result = mysql_query($query) or die(mysql_error());
$arr = array();
while ($row = mysql_fetch_assoc($result)) {

    $temp = array("userName" => $row["userName"],
     "userProfession" => $row["userProfession"],
      "userPic" => $row["userPic"]);

    array_push($arr, $temp);
}

$data = json_encode($arr);
echo "{\"userName\":" . $data . "}";
?>