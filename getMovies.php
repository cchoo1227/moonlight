<?php

$servername = "localhost";
$username = "f38ee";
$password = "f38ee";
$dbname = "f38ee";
$movie = $_GET['movie'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$getMovie = "SELECT * FROM movies";
$resultsMovie = mysqli_query($conn, $getMovie);
$movieArray = []; //init 2d array that functions as table with columns 'name', 'desc', 'rating' and 'image'

if (mysqli_num_rows($resultsMovie) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultsMovie)) {    

        array_push($movieArray, $row);

    }
}

$getComingSoon = "SELECT * FROM comingSoon";
$resultsComingSoon = mysqli_query($conn, $getComingSoon);
$comingSoonArray = [];

if (mysqli_num_rows($resultsComingSoon) > 0) {
    // output data of each row
    while($rowB = mysqli_fetch_assoc($resultsComingSoon)) {    
        array_push($comingSoonArray, $rowB);
    }
}

$getTimeSlots = "SELECT * from timeslots";
$resultsTimeSlots = mysqli_query($conn, $getTimeSlots);
$timeslotArray = [];
if (mysqli_num_rows($resultsTimeSlots) > 0) {
    // output data of each row
    while($rowC = mysqli_fetch_assoc($resultsTimeSlots)) {    
        array_push($timeslotArray, $rowC);
    }
}

$getScreenings = "SELECT * FROM screening LEFT JOIN timeslots ON screening.timeslotID = timeslots.timeslotID";
$resultsScreenings = mysqli_query($conn, $getScreenings);
$screeningsArray = [];

if (mysqli_num_rows($resultsScreenings) > 0) {
    // output data of each row
    while($rowD = mysqli_fetch_assoc($resultsScreenings)) {    
        array_push($screeningsArray, $rowD);
    }
}

?>