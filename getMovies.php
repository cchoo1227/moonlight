<?php

$servername = "localhost";
$username = "f38ee";
$password = "f38ee";
$dbname = "f38ee";
$movie = $_GET['movie'];

$getMovie = "SELECT * FROM movies";
$resultsMovie = mysqli_query($conn, $getMovie);
$movieArray = []; //init 2d array that functions as table with columns 'name', 'desc', 'rating' and 'image'

if (mysqli_num_rows($resultsMovie) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultsMovie)) {    

        array_push($movieArray, $row);

    }
}

$getComingSoon = "SELECT image FROM comingSoon";
$resultsComingSoon = mysqli_query($conn, $getComingSoon);
$comingSoonArray = [];

if (mysqli_num_rows($resultsComingSoon) > 0) {
    // output data of each row
    while($rowB = mysqli_fetch_row($resultsComingSoon)) {    
        array_push($comingSoonArray, $rowB[0]);
    }
}

?>