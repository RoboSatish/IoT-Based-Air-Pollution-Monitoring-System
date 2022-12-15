<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="temprecord";

//session_start();

$data = $_REQUEST["tempc"];
echo "Your registration is: ".$data.".";
//echo "Your registration is:".$data;

/* if(isset($_GET['tempc']))
{
$data=$_GET['tempc'];
//echo $data;
}
else
{
echo "No data received";
}  */
 //$s1=$_GET['temp'];
$conn = mysqli_connect($servername, $username, $password,$db);
 
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
 
//$sql="insert into 'temprecord' ('Temp') values ('".$_GET["tempc"]."')";
$sql="insert into temprecord (Temp) values ('$data')";
$qry = mysqli_query($conn ,$sql);
 
 
?>