<?php
     $user = $_GET['sid'];
/*
image.php
*/
require_once("config/db.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
$query = mysql_real_escape_string($query);
$result = mysql_query("SELECT money FROM users WHERE user_name='$user' ");

if($result === FALSE) { 
   echo "no";
   die();
	
}
while($row = mysql_fetch_array($result))
{
$money = $row['money']; 
}

    header("Content-type: image/jpeg");
    $imgPath = 'images/back.jpg';
    $image = imagecreatefromjpeg($imgPath);
    $color = imagecolorallocate($image, 0, 0, 0);
    $string = "Welcome back," . "$user" . "!";
	$string2 = "you have: " . "$money" . "$" ;
    $fontSize = 5;
    $x = 50;
    $y = 10;
	$x2 = 50;
    $y2 = 30;
    imagestring($image, $fontSize, $x, $y, $string, $color);
	 imagestring($image, $fontSize, $x2, $y2, $string2, $color);
    imagejpeg($image);
?>