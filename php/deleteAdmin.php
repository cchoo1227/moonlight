<?php 

$servername = "localhost";
$usernameDB = "f38ee";
$passwordDB = "f38ee";
$dbname = "f38ee";

$username = $_POST["username"];
$password = $_POST["password"];


// Create connection
$conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$password = md5($password);

$delAdmin = "DELETE FROM admin WHERE username = '" .$username. "' AND `password` = '" .$password. "'";
mysqli_query($conn, $delAdmin);

mysqli_close($conn);
header("Location: http://192.168.56.2/f38ee/moonlight/admin.php");
exit();
?>