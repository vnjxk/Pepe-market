<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- login form box -->
<center>
 <img src="images/pepe.jpg" alt="Pepe" style="width:550px;height:550px">
<form method="post" action="index.php" name="loginform">

    <label for="login_input_username"><b>Username</b></label><br>
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />
<br>
    <label for="login_input_password"><b>Password</b></label><br>
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
<br><br>
    <input type="submit"  name="login" value="Log in" />

</form>

<a href="register.php"><b>Register an account</b></a>
</center>