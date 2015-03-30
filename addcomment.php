<?php
session_start();
$comment = mysql_escape_string(htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8'));
$listingid =  mysql_escape_string($_POST['listing']);
$user = $_SESSION['user_name'];
$date = date('Y-m-d H:i:s');
require_once("config/db.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_error()) {
die('Connect Error (' . mysqli_connect_errno() . ') '
. mysqli_connect_error());
}
$sql = "INSERT INTO comments (`user`, `comment`, `date`, `listingid`) VALUES ('" . $user . "', '" . $comment . "', '" .
$date . "', '" . $listingid . "');
";

$addcomment = $mysqli->query($sql);
if ($addcomment) {
echo "Added!";
} else {
echo "failed. Please go back and try again.";
}
$mysqli->close();
header('Location: ' . $_SERVER['HTTP_REFERER'] . '');
?>