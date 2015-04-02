<a href="home.php" ><button>Home</button></a><br>
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
   echo "Error";
   die();
	
}
if (mysql_num_rows( $result ) == 0)
{
	echo "you have no pepe(s)";
	die();
}
echo '<b>To get full sized image , right click > Copy Image Location. and then paste it in your URL bar</b><br>';
while($row = mysql_fetch_array($result))
{
	echo '<hr>';
    $title = $row['Title'];
	$desc = $row['description'];
	$owner = $row['Owner'];
	$CLRpath = $row['CLRLocation'];
	$WMpath = $row['WMLocation'];
	$price = $row['Price'];
	$id = $row['idPepes'];
	$adddate = $row['DateAdded'];
	echo 'Watermarked - - - -   clear<br>';
	echo '<div style=";font-size:24pt;color:white;">';
echo '<a style="; text-decoration: none;" href=listing.php?id='. $id .'>';
	echo '<img src="sell/'.$WMpath.'" style="vertical-align: middle;width:100px;height:100px" /> ';
	echo '<img src="sell/'.$CLRpath.'" style="vertical-align: middle;width:100px;height:100px" /> ';
   echo ' <font color="black"> &nbsp&nbsp-&nbsp&nbsp <b>'. $title  .'</b></font>';
	echo '</div></a>';
}
echo '<hr>';
?>

