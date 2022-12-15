<?php
 
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$db="temprecord";
$conn = mysqli_connect($servername, $username, $password,$db);
 
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());}
 
$sql="SELECT * FROM temprecord";
 
$result=mysqli_query($conn,$sql);
 
 
if($result>0)
{
while($row=mysqli_fetch_assoc($result))
{
 
$savename= $row['Temp'];
echo $savename;
 
}
}
 
?>