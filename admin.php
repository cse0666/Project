<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
</head>
<body>
	<div class="header">
		<h2 class="dash">ADMIN DASHBOARD</h2>
		<button class="sign_in"><a class="link_upper" href="auser.php">View User Data</a></button>
		<button class="sign_up"><a class="link_upper" href="Login.php">Logout</a>  </button>
	</div><br><br><br>
	<div class="content">
			<h3 class="abc">List Of Users</h3><br>
			<div class="child_content">
			<table class="grid_container" border="1">
   
  		 <?php
    
    			$sql="SELECT * FROM login;";
    			$result=mysqli_query($conn,$sql);
    			$resultcheck=mysqli_num_rows($result);
    			if($resultcheck>0)
    			{
        		while($row = mysqli_fetch_assoc($result))
        		{

            			if ($row['profile']==1) {
               			$r=$row['uid'];

               			$u=strtoupper($r);
               			echo "<tr>";
						echo "<th>".$u."<br><br></th>";
						echo "<tr>";}
         		}
		    	}
		?>
  
</table>
</div>
</div>

</body>
</html>