<?php
    include('connection.php');
    session_start();
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
  
  <form action="Login.php" method="POST">
    <div class="input_field">
        <input type="text" placeholder="First Name" name="name">
    </div>
    <div class="input_field">
        <input type="password" placeholder="Password" name="pass">
    </div>
    
    <div class="btn">
        <input type="submit" onclick="window.location='Login.php'" class="Redirect" name="submit">
    </div>
  </form>
</div>
<?php
    include 'connection.php';
    if ($conn) {
        echo "connection successful";
    }else{
        echo "connection error";
    }
    $db=mysqli_select_db($conn,'havi');

    if (isset($_POST['submit'])) {
        $username=$_POST['name'];
        $password=$_POST['pass'];


        $sql="SELECT * FROM login WHERE uid='$username' && password='$password'";
        $query=mysqli_query($conn,$sql);
        $result=mysqli_num_rows($query);

        if ($result==1 ) {
            
            while ($row=mysqli_fetch_assoc($query)) {

                if ($row['profile']==0) {
                    header('location:admin.php?signin=successA');
                }
                if (($row['profile']==1)) {
                    $_SESSION['name'] = $_POST['name'];
                    header('location:user.php?signin=successL');
                }
                
            }
            }

        else{
            echo"login failed";
            header('location:Login.php?signin=fail(type_correct_username_and_password)');
        }
    }
?>
</body>
</html>