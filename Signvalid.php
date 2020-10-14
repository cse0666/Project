<?php
	include('connection.php');
	//validation for all fields
		if (isset($_POST['submit'])) {
		$uname=$_POST['name'];
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
			header("location:Signup.php?signup=empty");
			exit();
		    }
		elseif (!preg_match("/^[a-zA-Z]*$/", $uname)) {
			 	header("location:Signup.php?signup=char");
				exit();
			}
		elseif(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $Email)){
				 	header("location:Signup.php?signup=email");
					exit();
			}
		elseif(!preg_match('/^\d{10}$/',$Phone)){
				 	header("location:Signup.php?signup=phone");
					exit();
			}
		elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 5) {
			 	header("location:Signup.php?signup=password");
				exit();
			}
		elseif ($Cpass!=$Pass) {
				 	header("location:Signup.php?signup=conpassword");
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