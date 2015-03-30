<?php
require_once("config/db.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
$query = htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8');
$query = mysql_real_escape_string($query);
$result = mysql_query("SELECT * FROM pepes WHERE Title LIKE '%$query%' OR description LIKE '%$query%'");

if($result === FALSE) { 
    die();
	
}

while($row = mysql_fetch_array($result))
{
	
    $title = $row['Title'];
	$desc = $row['description'];
	$owner = $row['Owner'];
	$WMpath = $row['WMLocation'];
	$price = $row['Price'];
	$id = $row['idPepes'];
	$adddate = $row['DateAdded'];
	if ($price > 0)
	{
	echo '<img src="sell/'.$WMpath.'" style="width:100px;height:100px" /> ';
   echo '<a href=listing.php?id='. $id .'><b>'. $title . ' - Price:' . $price .'</b></a>';
	echo '<br></br>';
	}
}
?>


