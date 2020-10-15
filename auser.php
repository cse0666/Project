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
		<button class="sign_in"><a class="link_upper" href="admin.php">Back</a></button>
		<button class="sign_up"><a class="link_upper" href="Login.php">Logout</a>  </button>
	</div><br><br><br>
	

<div>
	<h3 class="abc">You can view comments of all users below: </h3>
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