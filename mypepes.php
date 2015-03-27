<?php



require_once("config/db.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
	session_start();
$query = $_SESSION['user_name'];
if ($query == null)
{
	echo 'Please Log in';
	die();
}
$result = mysql_query("SELECT * FROM pepes WHERE Owner='$query'");

if($result === FALSE) { 
    die();
	
}
if (mysql_fetch_array($result) == null)
{
	echo "you have no pepe(s)";
}
while($row = mysql_fetch_array($result))
{
	
    $title = $row['Title'];
	$desc = $row['description'];
	$owner = $row['Owner'];
	$CLRpath = $row['CLRLocation'];
	$WMpath = $row['WMLocation'];
	$price = $row['Price'];
	$id = $row['idPepes'];
	$adddate = $row['DateAdded'];
	echo 'Watermarked - - - -   clear<br>';
	echo '<img src="sell/'.$WMpath.'" style="width:100px;height:100px" /> ';
	echo '<img src="sell/'.$CLRpath.'" style="width:100px;height:100px" /> ';
   echo '<a href=delete.php?id='. $id .'><b>'. $title . ' - Price:' . $price .'</b></a>';
	echo '<br></br>';
}
?>