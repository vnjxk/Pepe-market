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
$sure = $_POST['IsHeSure'];
$id = $_POST['id'];
if(!isset($sure)){
	echo '
	<!DOCTYPE html>
	 <form action="delete.php" method="POST" id="makinsure">
   <input type="hidden" name="id" value="' . $id . '">
   <input type="hidden" name="IsHeSure" value="Yes">
</form>

<button type="submit" form="makinsure" value="Submit">Are you sure you want to delete all record for that pepe? (click to say yes)</button> ';
}
else{
require_once("config/db.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
$id = mysql_real_escape_string($id);
$owner = $_SESSION['user_name'];
$result = mysql_query("DELETE FROM pepes WHERE
idPepes='$id' AND Owner='$owner'");
}
if($result === FALSE) { 
   echo "no";
   die();
	
}
else{
	echo "Pepe has been deleted";
}

?>