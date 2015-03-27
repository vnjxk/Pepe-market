<!-- if you need user information, just put them into the $_SESSION variable and output them here 
Hey, <?php //echo $_SESSION['user_name']; ?>. You are logged in.
Try to close this browser tab and open it again. Still logged in! ;)
<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" 
<a href="index.php?logout">Logout</a>
-->
<title>Pepe Market</title>
<body style=width:100%;margin:auto;min-width:1650px;max-width:2200px>
<a href="mypepes.php"><img src="images/mypepes.jpg" alt="Pepe" style="width:300px;height:300px"></a>
<a href="sell"><img src="images/sellyours.jpg" alt="Pepe" style="width:300px;height:300px"></a>
<a href="search.php"><img src="images/snb.jpg" alt="Pepe" style="width:300px;height:300px"></a>
<a href="index.php?logout"><img src="images/logout.jpg" alt="Pepe" style="width:300px;height:300px"></a>
<img src="image.php?sid=<?php echo $_SESSION['user_name']; ?>" alt="Pepe" style="width:445px;height:300px">
</body>