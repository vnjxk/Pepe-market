<!DOCTYPE html>
<center>
<br>
<h1>Search for a pepe with a keyword!</h1>
<br>
<form action="buy.php" method="get" id="search">
   <input type="text" name="query">
   
</form>
<br>
<button type="submit" form="search" value="Submit">Search</button>
<br><br><br>
<a href="browse.php"><b>Or Just browse</b></a><br>
 <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>
</center>
