<?php

require_once("classes/Login.php");
$login = new Login();
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
$id = $_GET['id'];


require_once("config/db.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
$id = mysql_real_escape_string($_GET['id']);
$owner = $_SESSION['user_name'];
$result = mysql_query("DELETE FROM pepes WHERE
idPepes='$id' AND Owner='$owner'");

if($result === FALSE) { 
   echo "no";
   die();
	
}
else{
	echo "Pepe has been deleted";
header('Location: ' . dirname("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI])") . '/mypepes.php' . '');
}

?>