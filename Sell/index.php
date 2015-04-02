<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sell your Pepe here</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<?php
require_once("../classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == false) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
   header('Location: ' . dirname(dirname("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI])")) . '');
	
    
} 



	?>
</head>
<body id="main_body" >

	
	<div id="form_container">
	
		<h1><a>Sell your Pepe here</a></h1>
		<form  class="appnitro" enctype="multipart/form-data" method="post" action="sell.php">
					<div class="form_description">
			<h2>Sell your Pepe here</h2>
			<p>All pepe's are watermarked with our system automated watermarker.
Pepe's pre-watermarked will be deleted!(successful adding will just reload the page.)<br> Gifs cant be watermarked.(but can be safely uploaded) </p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Title </label>
		<div>
			<input id="element_1" name="title" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Description </label>
		<div>
			<textarea id="element_2" name="desc" class="element textarea large"></textarea> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Price </label>
		<div>
			<input id="element_3" name="price" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Upload image </label>
		<div>
			<input id="element_4" name="img" class="element file" type="file"/> 
		</div>  
		</li>
			
					<li class="buttons">
			    
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
			
		</li>
			</ul>
		</form>	

	</div>
	 <a href="../home.php" ><button>Home</button></a>


	</body>
</html>
