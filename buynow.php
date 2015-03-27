<?php

// load the login class
require_once("classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("views/not_logged_in.php");
	die();
}
$buyer  = $_SESSION['user_name'];
$sure = $_GET['IsHeSure'];
$query = $_GET['id'];
if(!isset($sure)){
	echo '
	<!DOCTYPE html>
	 <form action="buynow.php" method="get" id="makinsure">
   <input type="hidden" name="id" value="' . $query . '">
   <input type="hidden" name="IsHeSure" value="Yes">
</form>

<button type="submit" form="makinsure" value="Submit">Are you sure? (click to say yes)</button> ';
}
else{
require_once("config/db.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
$query = mysql_real_escape_string($query);
$result = mysql_query("SELECT Price,Owner,CLRLocation FROM pepes WHERE idPepes=$query ");

if($result === FALSE) { 
   echo "no";
   die();
	
}

while($row = mysql_fetch_array($result))
{
	$owner = $row['Owner'];
	$CLRpath = $row['CLRLocation'];
	$price = $row['Price'];    
}
/***********************************************************/
$buyer = mysql_real_escape_string($buyer);
$result = mysql_query("SELECT money FROM users WHERE user_name='$buyer' ");

if($result === FALSE) { 
   echo "no";
   echo $buyer;
   die();
	
}

while($row = mysql_fetch_array($result))
{
$bMoney = $row['money']; 
}

if ($bMoney < $price)
{
	echo "You dont have enough money!";
}
else
    {
	$bMoney = $bMoney - $price;
    $result = mysql_query("UPDATE users SET money='$bMoney' WHERE user_name='$buyer'");
   if($result === FALSE) { 
   echo "error!";
   die();
   }
   
   $result = mysql_query("UPDATE users SET money=(money + $price) WHERE user_name='$owner'");
   if($result === FALSE) { 
   echo "error!";
   die();
   }
}
	
	
	}
echo 'Success!<br>';
echo '<img src="sell/'.$CLRpath.'" /> ';
 echo '<br><a href=listing.php?id='. $id .'><b> Go back to listing</b></a>';
?>