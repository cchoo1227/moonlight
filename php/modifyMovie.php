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

$form = array("name" => $_POST["movieName"], "rating" => $_POST["movieRating"], "desc" => $_POST["movieDesc"], "image" => $_POST["movieImg"]);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

foreach ($form as $key => $value) {

    if ($value === NULL || $value === "") {
        return false;
    }

    else {

        $sql = "UPDATE " .$movieType. " SET " .$key. " = '" . $value . "' WHERE " .$idType. " = " .$id ;
        mysqli_query($conn, $sql);

    }

}
mysqli_close($conn);
header("Location: http://192.168.56.2/f38ee/moonlight/admin.php");
exit();

//header('Location: admin.php');
//exit();

?>