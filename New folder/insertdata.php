		

<?php
/*$servername = "localhost";
$username = "iautolab_users";
$password = "jaibalaji12##";
$dbname = "iautolab_users";*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "air";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name=$_POST[name];
$sql = "INSERT INTO iita1 (name,email,mobile,address)
VALUES ('$_POST[name]', '$_POST[email]', '$_POST[mobile]','$_POST[address]')";

 if($name=='')
    {
          echo"<script>window.open('index.html','_self')</script>";
exit();
    }

if ($conn->query($sql) === TRUE) {
  //  echo "New record created successfully";
  echo"<script>window.open('welcome.php','_self')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>