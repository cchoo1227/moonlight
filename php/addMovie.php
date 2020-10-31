<?php 

$servername = "localhost";
$username = "f38ee";
$password = "f38ee";
$dbname = "f38ee";

$movieType = $_POST["movieType"];
$name = $_POST["movieName"];
$rating = $_POST["movieRating"];
$desc = $_POST["movieDesc"];
$image = $_POST["movieImg"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$addMovie = "INSERT INTO " .$movieType. " (name, `desc`, rating, image) VALUES ('" .$name. "','" .$desc. "','" .$rating. "','" .$image. "')";
mysqli_query($conn, $addMovie);

mysqli_close($conn);
header("Location: http://192.168.56.2/f38ee/moonlight/admin.php");
exit();
?>