<?php
require_once("config/db.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
$result = mysql_query("SELECT * FROM pepes ORDER BY DateAdded desc");

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
	if ($price > 0){
		echo '<hr>';
	echo '<div style=";font-size:24pt;color:white;">';
	echo '<a style="; text-decoration: none;" href=listing.php?id='. $id .'>';
	echo ' &nbsp&nbsp<img  src="sell/'.$WMpath.'" style="vertical-align:middle;width:100px;height:100px " /> ';
   echo '<b> <font color="black"> &nbsp&nbsp-&nbsp&nbsp   '. $title . ' - Price:' . $price .'</b></font></a>';
	echo '</div></a>';
	}

}
echo '<hr>';
?>