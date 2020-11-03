<?php 

$servername = "localhost";
$username = "f38ee";
$password = "f38ee";
$dbname = "f38ee";

$id = $_POST["movieId"];

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$insert = "INSERT INTO movies (`name`, `desc`, rating, `image`) SELECT `name`, `desc`, rating, `image` from comingSoon WHERE comingSoonId = " .$id; 
echo $insert;
if (mysqli_query($conn, $insert)) {
    echo "success";
}
else {
    echo "fail";
}

$delete = $sql = "DELETE FROM comingSoon WHERE comingSoonId = " .$id; 
mysqli_query($conn, $sql);
mysqli_close($conn); 
header("Location: http://192.168.56.2/f38ee/moonlight/admin.php");
exit();  
?>