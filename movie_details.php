<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/tabs.js"></script>
</head>

<body>

<!--start of navbar-->
<div id="nav">
    <div class="container">
        <img src="images/logo_light.svg">
        <ul>
            <li><a href="/index.html">HOME</a></li>
            <li><a href="/movies.html">MOVIES</a></li>
            <li><a href="#">SHOWTIMES</a></li>
            <li><a href="#">CONTACT</a></li>
            <li><a href="#"><img width="24px" height="24px" src="images/cart_outlined.svg"></a></li>
        </ul>
    </div>
</div>
<!--end of navbar-->

<!--start of main content-->

<div class="section movie-info">
    <div class="container">
        <table>
            <tr>
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


$getMovie = "SELECT * FROM movies WHERE movieId  = " .$movie;
$resultsMovie = mysqli_query($conn, $getMovie);

if (mysqli_num_rows($resultsMovie) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultsMovie)) {    
      
        echo "<td><img src='" .$row["image"]. "'></td>";
        echo "<td><h1>" .$row["name"]. "</h1>";
        echo "<div class='rating'>" .$row["rating"]. "</div>";
        echo "<p>" .$row["desc"]. "</p></td>";
        
    }

} else {
    echo "Movie not found";
}
?>
            </tr>
        </table>

        <h1 class="underlined-titles dark">SHOWTIMES</h1>
        <table class="date-tab">
            <?php

                $dateArray = [];
                $getDates = "SELECT DISTINCT(date) FROM screening WHERE movieId  = " .$movie;
                $resultsDates = mysqli_query($conn, $getDates);

                if (mysqli_num_rows($resultsDates) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($resultsDates)) {    
                        array_push($dateArray, $row["date"]);
                    }
                }

                foreach ($dateArray as $date) {
                    echo "<tr><td><h3>" .date_format(date_create($date),"D, d M Y"). "</h3></td></tr>";
                    echo "<tr class = 'timeslots'>";
                    $getScreening = "SELECT * FROM screening WHERE movieId  = " .$movie . " AND `date` = '" .$date. "'";
                    $resultsScreening = mysqli_query($conn, $getScreening);
                    if (mysqli_num_rows($resultsScreening) > 0) {
                        // output data of each row
                        while($rowA = mysqli_fetch_assoc($resultsScreening)) {
                            $getTimes = "SELECT * FROM timeslots WHERE timeslotId  = " .$rowA["timeslotId"];
                            $resultsTimes = mysqli_query($conn, $getTimes);
                            if (mysqli_num_rows($resultsTimes) > 0) {
                                // output data of each row
                                while($rowB = mysqli_fetch_assoc($resultsTimes)) {  
                                    echo "<td><form action='get'><button name='screening' type='submit' value='" .$rowA["screeningId"]. "' formaction='seat_select.php'>" .date_format(date_create($rowB["time"]),"h:i"). "</button></form></td>";
                                }
                        }
                    }
                    echo "</tr>";
                }
            }

            mysqli_close($conn);
            ?>
        </table>

    </div>
</div>



<!--end of main content-->



<!--start of footer-->
<div id="footer">
    <div class="container">
        <img src="images/logo_light.svg">
            <table>
                <tr>
                    <td>
                        <h4>SITE MAP</h4>
                        <ul>
                            <li><a href="#">HOME</a></li>
                            <li><a href="#">MOVIES</a></li>
                            <li><a href="#">SHOWTIMES</a></li>
                        </ul>
                    </td>
                    <td>
                        <h4>CONTACT</h4>
                        <ul>
                            <li><img src="images/address_outlined.svg"> 123 SUNSHINE AVENUE<br>#01-35 S123456</li>
                            <li><img src="images/call_outlined.svg"> +65 6876 5432</li>
                            <li><img src="images/email_outlined.svg"> INFO@MOONLIGHT.COM.SG</li>
                        </ul>
                    </td>
                </tr>
            </table>      
    </div>
</div>
<!--end of footer-->

<script src="scripts/showtimesR.js"></script>
</body>

