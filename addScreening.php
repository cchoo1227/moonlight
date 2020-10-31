<?php 

$servername = "localhost";
$username = "f38ee";
$password = "f38ee";
$dbname = "f38ee";

$id = $_POST["movieId"];
$date = $_POST["date"];
$timeslot = $_POST["timeslot"];
$clash = false;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$getExistingTimeslots = "SELECT timeslotId FROM screening WHERE `date` = '" .$date. "'";  
$resultsExistingTimeslots = mysqli_query($conn, $getExistingTimeslots);
$existingTimeslotArray = [];

if (mysqli_num_rows($resultsExistingTimeslots) > 0) {
// output data of each row
    while($row = mysqli_fetch_assoc($resultsExistingTimeslots)) {    
        array_push($existingTimeslotArray, $row["timeslotId"]);
    }

}

foreach ($existingTimeslotArray as $existingTimeslot) {
    if ($existingTimeslot == $timeslot) {
        $clash = true;
    }
}

if ((strtotime($date) <= strtotime('now')) || $clash) {

    if( strtotime($date) <= strtotime('now') ) {
        echo "Please select a date after today. <br>";
    }
    
    if ($clash) {
        echo "Timeslot clash! Please select another timeslot. <br>";
    }

}

else {

    $addScreening = "INSERT INTO screening (movieId, `date`, timeslotId) VALUES (" .$id. ",'" .$date. "'," .$timeslot. ")";
    var_dump($addScreening);
    if (mysqli_query($conn, $addScreening)) {
        echo "Screening added.";
    }
    else {
        echo "error";
    }

} 

mysqli_close($conn);
?> 