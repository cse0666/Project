<?php
    include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/Styles.css">
	
</head>
<body>
    <div class="content_logo">
           
            <button class="sign_in"><a class="link_upper" href="Signup.php">Sign Up</a></button>
            <button class="sign_up"><a class="link_upper" href="Login.php">Login</a>  </button>
        </div>

<div class="wrapper">
  <h2>LOGIN!</h2>
  <div id="error_message"></div>
  <form action="Signvalid.php" method="POST">
    <div class="input_field">
        <input type="text" placeholder="Name" id="name">
    </div>
    <div class="input_field">
        <input type="password" placeholder="Password" id="pass">
    </div>
    
    <div class="btn">
        <input type="submit" onclick="window.location='Login.php'" class="Redirect" >
    </div>
  </form>
</div>

</body>
</html>