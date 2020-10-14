<?php
$db_host='localhost';
$db_user='root';
$db_passwd='';
$db_name='havi';
$dbh =mysqli_connect($db_host,$db_user,$db_passwd,$db_name)
or
die("Error connecting to the database");
echo"connection is success";

$crttb= "CREATE TABLE login (
uid VARCHAR(13) PRIMARY KEY,
password VARCHAR(30) NOT NULL)";

$crttb1= "CREATE TABLE user (
uid VARCHAR(13) PRIMARY KEY,
data VARCHAR(255) NOT NULL)";

$result=mysqli_query($dbh,$crttb) or die("Error in login query");
echo "login table created";

$result1=mysqli_query($dbh,$crttb1) or die("Error in user query");
echo "user table created";
