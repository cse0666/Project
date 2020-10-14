<?php
  include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>welcome</title>
	<link rel="stylesheet" type="text/css" href="css/Styles.css">
	
</head>
<body>
  <div class="content_logo">
           
            <button class="sign_in"><a class="link_upper" href="Signup.php">Sign Up</a></button>
            <button class="sign_up"><a class="link_upper" href="Login.php">Login</a>  </button>
        </div>

<div class="wrapper">
  <h2>REGISTER!</h2>
  
  <form action="Signup.php" method="POST">
    <div class="input_field">
        <input type="text" placeholder="First Name" name="name">
    </div>
    <div class="input_field">
        <input type="text" placeholder="Last Name" name="lname">
    </div>
    
    <div class="input_field">

       <label for="dob">DOB: </label>
        <input type="date" name="dob" >
   
    </div>
    <div class="input_field">
        <input type="text" placeholder="Email" name ="email">
    </div>
    
    <div class="input_field">
        <input type="text" placeholder="Phone Number" name="phone">
    </div>
    
    <div class="input_field">
        <input type="password" placeholder="Password" name="pass">
    </div>
    <div class="input_field">
        <input type="password" placeholder="Re-Enter Password" name="pass1">
    </div>
    <div class="btn">
        <input type="submit" onclick="window.location='Login.php'" class="Redirect" name="submit" >
    </div>
  </form>
</div>
<?php
    // $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // if(strpos($fullurl,"signup=empty")==true){
    //   echo "you did not fill all the fields!!";
    //   exit();
    // }
    // elseif(strpos($fullurl,"signup=char")==true){
    //   echo "you have used invalid characters!!";
    //   exit();
    // }
    // elseif(strpos($fullurl,"signup=email")==true){
    //   echo "you have used invalid email format!!";
    //   exit();
    // }
    // elseif(strpos($fullurl,"signup=phone")==true){
    //   echo "you have used invalid phone number!!";
    //   exit();
    // }
    // elseif(strpos($fullurl,"signup=password")==true){
    //   echo "your password format is not correct!!"."<br>";
    //   echo"Must contain at least one number, one uppercase, one special character and lowercase letter,and at least 5 or more characters.";
    //   exit();
    // }
    // elseif(strpos($fullurl,"signup=conpassword")==true){
    //   echo "your password does not match!!"."<br>";
      
    //   exit();
      if (isset($_POST['submit'])) {
            $uname=$_POST['name'];
            $uname1=$_POST['lname'];
            $Dob=$_POST['dob'];
            $Phone =$_POST['phone'];
            $Email=$_POST['email'];
            $password=$_POST['pass'];
            $conpassword=$_POST['pass1'];
//validation factors for password
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(empty($uname)||empty($Dob)||empty($Phone)||empty($Email)||empty($password)||empty($conpassword)){
      
      echo "fill all details!";
          exit();
        }
    elseif (!preg_match("/^[a-zA-Z]*$/", $uname)) {
        echo "Name should contain only character!";
          exit();
      }
      elseif (!preg_match("/^[a-zA-Z]*$/", $uname1 )) {
        echo "Name should contain only character!";
          exit();
      }
    elseif(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $Email)){
          echo "invalid email!";
          exit();
      }
    elseif(!preg_match('/^\d{10}$/',$Phone)){
          echo "invalid phone number!";
          exit();
      }
    elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 5) {
        echo "password must contain an uppercase a lowercase a digit a specialchar and length greater than 5!";
          exit();
      }
    elseif ($Cpass!=$Pass) {
          echo "password does not match!";
          exit();
         }
         else{
        $id = $_POST['name'];
        $password= $_POST['pass'];
  
        $sql="INSERT INTO login (uid,password) VALUES ('$id','$password')";
        $result=mysqli_query($conn,$sql) or
        die("connection error");
        header("location:Signup.php?signup=success");
        exit();
      
    }
    
  
  }
    

  
  ?>

</body>
</html>