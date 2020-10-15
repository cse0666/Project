<?php
  include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>USER</title>
	<link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
</head>
<body>
	<div class="header">
		<h2 class="dash">USER DASHBOARD</h2>
		<!-- <button class="sign_in"><a class="link_upper" href="user.php">View User Data</a></button> -->
		<button class="sign_up"><a class="link_upper" href="Login.php">Logout</a>  </button>
	</div><br><br><br>
	<div>
		<h3 class="abc">Enter information you want to share with other users: </h3>
		<br><br>
		<form action="user.php" method="POST">
			<div class="input_field">
        			<input type="text" placeholder="First Name" name="name">
    		</div>
    		<div class="input_field">
        			<textarea placeholder="User information" name="ui"></textarea>
    		</div>
    		<div class="btn">
        			<input type="submit"  name="submit" >
    		</div>
		</form>
	</div>
	<?php
        if(isset($_POST['submit'])){


                    $uname= $_POST['name'];
                    $text = $_POST['ui'];
                    $sql="SELECT * FROM login;";
                    $result=mysqli_query($conn,$sql);
                    $datas=array();
                    $resultcheck=mysqli_num_rows($result);
                    if($resultcheck>0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                                $datas[]=$row;
                        }
                            
                               
                                foreach ($datas as $data) {
                                    if(empty($uname)||empty($text)){
                                        header('location:user.php?Fill_All_Fields');
                                        exit();
                                     }
            
                                    elseif ($uname==$data['uid']) {
                                        $sql="INSERT INTO user(uid,data) VALUES ('$uname','$text')";
                                        $result=mysqli_query($conn,$sql)  or
                                        die("connection error");
                                         
                                        header("location:user.php?Information_Saved");
                                        exit();
                                    }
                                    else{
                                        // echo "No Such User Has Registered";
                                        header('location:user.php?Enter_Registered_Name');}
                                    }
                                    }
                                }
                            
            
?>
<br><br>
<div>
	<h3 class="abc">You can view comments of other users below: </h3>
</div>
<div class="content">
			<div class="child_content">
			
   
  		 <?php
    
    			$sql="SELECT * FROM user;";
    			$result=mysqli_query($conn,$sql);
    			$resultcheck=mysqli_num_rows($result);
    			if($resultcheck>0)
    			{
        		while($row = mysqli_fetch_assoc($result))
        		{

            			
               			$r=$row['uid'];
               			$u=strtoupper($r);
               			$d=$row['data'];
               			// echo "<tr>";
						echo "<div>".$u." ".":"." ".$d."<br><br></div>";
						// echo "<tr>";
         		}
		    	}
		?>
  

</div>
</div>


</body>
</html>