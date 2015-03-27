<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>
<link rel="stylesheet" type="text/css" href="style.css">


<div class="container">

    <form id="signup" method="post" action="register.php" name="registerform">

        <div class="header">
        
            <h3>Registration</h3>
            
            
            
        </div>
        
        <div class="sep"></div>

        <div class="inputs">
        
            <input type="username" name="user_name" placeholder="Username" autofocus />   
			<input type="email" name="user_email" placeholder="Email" autofocus />    
			<input type="password" name="user_password_new"  pattern=".{6,}" placeholder="Password" autofocus />  
            <input type="password" name="user_password_repeat" pattern=".{6,}"  placeholder="Repeat Password" />
            

            
          
        <input type="submit"  id="submit" name="register" value="Register" />
        </div>

    </form>
<center><a href="index.php">Back to Login Page</a></center>
</div>
