<?php 

$servername = "localhost";
$username = "f38ee";
$password = "f38ee";
$dbname = "f38ee";

$movieType = $_POST["movieType"];

if ($movieType == "movies") {
    $idType = "movieId";
    $id = $_POST["movieId"];

} 
elseif ($movieType == "comingSoon") {
    $idType = "comingSoonId";
    $id = $_POST["comingSoonId"];
}

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM " .$movieType. " WHERE " .$idType. " = " .$id ;
echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "success";
}
else {
    echo "fail";
}    
mysqli_close($conn);
//header('Location: admin.php');
//exit();

?>