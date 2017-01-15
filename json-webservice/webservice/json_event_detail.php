<?php
include ('config.php');

$eventID=$_GET['eventID'];

$query = "SELECT * from event  where eventID='$eventID' ";
//echo $query;
$result = mysql_query($query) or die(mysql_error());

$arr = array();

while ($row = mysql_fetch_assoc($result)) {

    $temp = array("eventID" => $row["eventID"],
   
     "judul" => $row["judul"],
	 "tanggal" => $row["tanggal"],
     "jam" => $row["jam"],
     "lokasi" => $row["lokasi"],
      "keterangan" => $row["keterangan"]
     
     );
    
    array_push($arr, $temp);
}
$data = json_encode($arr);
echo "{\"list_event\":" . $data . "}";
?>