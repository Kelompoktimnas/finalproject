<?php
include("koneksi.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Data Pemain Timnas Indonesia</title>

<style type="text/css">
#logo {
 width: 300px;
 height: 200px;	
 float:left;
}
#judul {
 margin-left : 205px;
 width:900px;
 height: 200px;	
 text-align:center;
}

</style>
</head>
<body>
<center>
  <br>
</center>
<hr size="4" color="#000000" />    
   <center> <h2>LAPORAN DATA PEMAIN TIMNAS INDONESIA</h2>
	<h3>&nbsp;</h3>
	<?php
	$sql = mysqli_query($koneksi, "SELECT * FROM tbl_users ORDER BY userName ASC");
?>
</center>
<center>
<table border="0" bgcolor="#000000" width="700">
      <tr bgcolor="#FFFFFF" height="40">
        <center><td width="20">No</td></center>
        <center><td width="70">Nama Pemain</td></center>
		  <center><td width="70">Posisi Pemain</td></center>
      </tr>
      <?php
			   $i=1;
			while($row = mysqli_fetch_assoc($sql)){
			echo "<tr bgcolor=white>
              <td>$i</td>
              <td>$row[userName]</td>
              <td>$row[userProfession]</td>
			  </td>
            </tr>";
			$i++;
			}
			?>
    </table></center>
    <center>
		<input type="submit" name="button" id="button" value="Print" onclick="print()" />
	</center>
</body>
</html>

