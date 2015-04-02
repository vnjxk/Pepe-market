<center>
 <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
<br>
<?php
require_once("config/db.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_NAME);
//$query = %_GET['query'];
$query = $_GET['id'];
$query = mysql_real_escape_string($query);
$result = mysql_query("SELECT * FROM pepes WHERE idPepes=$query ");
session_start();
if (mysql_num_rows( $result ) == 0)
{
	echo "Listing not found<br><br>";
	echo ' <a href="home.php" ><button>Home</button></a>';
	die();
}
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
		echo '<p>'. nl2br($desc) .'</p>';
      echo '<b>Asked price: </b>' . $price;
	  echo '<br></br>';
	  if (($price < 1) || ($price == null)){
		  echo '<b>NOT FOR SALE</b>';
		  		  	  	  if (($_SESSION['user_name'] == $owner))
	  {
	echo '<br><br><a href="delete.php?id=' . $query . '"><input type="submit" action:"" value="Delete"></a>';
	  }
	  }else{
		  	  	  if (($_SESSION['user_name'] == $owner))
	  {
	echo '<br><br><a href="delete.php?id=' . $query . '"><input type="submit" action:"" value="Delete"></a>';
	  } else {
     echo '<a href="Buynow.php?id=' . $id . '"><img src="images/Buyit.jpg"
  alt="Buy it Now!"
  /></a>';
	  }
	  }
	
	echo '<br></br>';
	echo '<hr>';

	
	$result = mysql_query("SELECT * FROM comments WHERE listingid=" . $query . "");

if($result === FALSE) { 
    die();
	
}

while($row = mysql_fetch_array($result))
{
	
	$comm = $row['comment'];
	$user = $row['user'];
	$source = $row['date'];
	$date = new DateTime($source);
    echo '<u><b>' . $user . ' - (' . $date->format('d-m-Y h:i') . ')</b></u>
 <p >' . nl2br($comm) . '</p>';
	echo '<hr> ';
}
}

?>

<form name="addcomment" action="addcomment.php"" method="POST">
<div align="center">
Comment on this<br><br>
<textarea cols="40" rows="5" name="comment">

</textarea>
<br><br>
<input name="listing" type="hidden" value="<?php echo $_GET['id'];?>">
<input type="submit" value="Submit">
</div>
</form>
</center>


