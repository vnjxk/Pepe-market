<center>
<?php
require_once("config/db.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
//$query = %_GET['query'];
$query = $_GET['id'];
$query = mysql_real_escape_string($query);
$result = mysql_query("SELECT * FROM pepes WHERE idPepes=$query ");

if($result === FALSE) { 
   echo "no";
   die();
	
}

while($row = mysql_fetch_array($result))
{
	
    $title = $row['Title'];
	$desc = $row['Description'];
	$owner = $row['Owner'];
	$WMpath = $row['WMLocation'];
	$price = $row['Price'];
	$id = $row['idPepes'];
	$adddate = $row['DateAdded'];
	   echo '<title>'. $title .'</title>';
	echo '<img src="sell/'.$WMpath.'" /> ';
		echo '<br></br>';
	echo '<b>'. $title .'</b>';
		echo '<p>'. $desc .'</p>';
      echo '<b>Asked price: </b>' . $price;
	  echo '<br></br>';
     echo '<a href="Buynow.php?id=' . $id . '"><img src="images/Buyit.jpg"
  alt="Buy it Now!"
  /></a>';
	echo '<br></br>';
}
?>

</center>


