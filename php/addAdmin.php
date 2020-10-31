<?php 

$servername = "localhost";
$usernameDB = "f38ee";
$passwordDB = "f38ee";
$dbname = "f38ee";

$username = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confPassword"];

// Create connection
$conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($password !== $confirmPassword) {
    echo "Passwords do not match";
    exit();
}

$password = md5($password);

$addAdmin = "INSERT INTO admin (username, `password`) VALUES ('" .$username. "','" .$password. "')";
mysqli_query($conn, $addAdmin);

mysqli_close($conn);
header("Location: http://192.168.56.2/f38ee/moonlight/admin.php");
exit();
?>