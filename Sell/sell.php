<?php
include 'image.compare.class.php';
$class = new compareImages;
	  $uploadpath2 = '\Pepes'; 
$uploadpath = 'Pepes/'; // directory to store the uploaded files
$max_size = 10000; // maximum file size, in KiloBytes
$alwidth = 9000; // maximum allowed width, in pixels
$alheight = 8000; // maximum allowed height, in pixels
$allowtype = array('bmp', 'gif', 'jpg', 'jpe', 'png'); // allowed extensions
if(isset($_FILES['img']) && strlen($_FILES['img']['name']) > 1) {
// $uploadpath = $uploadpath . basename( $_FILES['img']['name']); // gets the file name
$sepext = explode('.', strtolower($_FILES['img']['name']));
$type = end($sepext); // gets extension
list($width, $height) = getimagesize($_FILES['img']['tmp_name']); // gets image width and height
$err = ''; // to store the errors
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 32);
$endname = $randomString . '.' . $type;
$uploadpath = $uploadpath. $endname;
// Checks if the file has allowed type, size, width and height (for images)
if(!in_array($type, $allowtype)) $err .= 'The file: <b>'. $_FILES['img']['name']. '</b> not has the allowed extension type.';
if($_FILES['img']['size'] > $max_size*1000) $err .= '<br/>Maximum file size must be: '. $max_size. ' KB.';
if(isset($width) && isset($height) && ($width >= $alwidth || $height >= $alheight)) $err .= '<br/>The maximum Width x Height must be: '. $alwidth. ' x '. $alheight;
// If no errors, upload the image, else, output the errors
if($err == '') {
	/**********************/
	 
      $dataDir  = dirname(__FILE__). $uploadpath2;
	  
      try
            {
      $dir  = new DirectoryIterator($dataDir);
      $PicSen = 10;
      foreach ($dir as $file)
      {
		  
            if (!$file->isDot()) {
        $fileName = $file->getPathname();
		$hammer = $class->compare($_FILES['img']['tmp_name'],$fileName);
		
		if (($hammer < $PicSen) && ($hammer != null))
		{
			echo "That Photo already exist!";

			die();
		}
    }
		
      }
             }
              catch (Exception $ex)
             {
                
             } 	
			 
	/***********************/
if(move_uploaded_file($_FILES['img']['tmp_name'], $uploadpath)) {
echo '<button onclick="history.go(-1);">Back </button><br>';	
echo 'File: <b>'. basename( $_FILES['img']['name']). '</b> successfully uploaded:';
echo '<br/>File type: <b>'. $_FILES['img']['type'] .'</b>';
echo '<br />Size: <b>'. number_format($_FILES['img']['size']/1024, 3, '.', '') .'</b> KB';
if(isset($width) && isset($height)) echo '<br/>Image Width x Height: '. $width. ' x '. $height;
$imageaddr = 'http://'.$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['REQUEST_URI']), '\\/').'/'.$uploadpath.'</b>';

}
else echo '<b>Unable to upload the file.</b>';
}
else echo $err;
}
$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$desc = htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8');
$price = htmlspecialchars($_POST['price'], ENT_QUOTES, 'UTF-8');
if ($price >4000000000)
{
echo "Thats too much";
die();
}
//water mark
$WMpath = 'WMPepes/';
/****/
    if ($type == 'jpg') {
        $image = imagecreatefromjpeg($uploadpath);
    } else
    if ($type == 'jpeg') {
        $image = imagecreatefromjpeg($uploadpath);;
    } else
    if ($type == 'png') {
        $image = imagecreatefrompng($uploadpath);
    } else
    if ($type == 'gif') {
        $image = imagecreatefromgif($uploadpath);
    }
	else {
		echo "Error with the image";
		
	}
/****/

$imageSize = getimagesize($uploadpath);
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 32);
$endname = $randomString . '.' . $type;
$WMpath = $WMpath . $endname;
$watermark = imagecreatefrompng('stamp.png');
$watermark_o_width = imagesx($watermark);
$watermark_o_height = imagesy($watermark);
$newWatermarkWidth = $imageSize[0];
$newWatermarkHeight = $watermark_o_height * $newWatermarkWidth / $watermark_o_width;
imagecopyresized($image, $watermark, $imageSize[0]/2 - $newWatermarkWidth/2, $imageSize[1]/2 - $newWatermarkHeight/2, 0, 0, $newWatermarkWidth, $newWatermarkHeight, imagesx($watermark), imagesy($watermark));
imagepng($image, $WMpath);
imagedestroy($image);
imagedestroy($watermark);
session_start();
require_once("../config/db.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_error()) {
die('Connect Error (' . mysqli_connect_errno() . ') '
. mysqli_connect_error());
}

$sql = "INSERT INTO pepes (Title, Description, DateAdded, WMLocation, CLRLocation, Price, Owner)
VALUES('" . $title . "', '" . $desc . "', '" . date('Y-m-d H:i:s') . "', '" . $WMpath . "', '" . $uploadpath . "', '" . $price . "', '" . $_SESSION['user_name'] . "');";
$query_new_user_insert = $mysqli->query($sql);
if ($query_new_user_insert) {
echo "Uploaded!";
header('Location: ' . dirname(dirname("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI])")) . '') . '';
} else {
echo "Upload failed. Please go back and try again.";
}
$mysqli->close();
?>
