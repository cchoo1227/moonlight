<?php include 'getMovies.php';?>
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
<div class="section showtimes"> 
    <div class="container">
        <h1 class="page-title">SHOWTIMES</h1>
        <div class="date-tabs">
            <ul>
                <!--TODO: print each date tab toggle using a loop, replace ID & text-->
                <!--start php-->
                <?php
                    $servername = "localhost";
                    $username = "f38ee";
                    $password = "f38ee";
                    $dbname = "f38ee";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $movieArray = [];
                    $getMovies = "SELECT name FROM movies";
                    $resultsMovies = mysqli_query($conn, $getMovies);

                    if (mysqli_num_rows($resultsMovies) > 0) {
                        // output data of each row
                        while($rowB = mysqli_fetch_assoc($resultsMovies)) {    
                            array_push($movieArray, $rowB["name"]);
                        }
                    }

                    $dateArray = [];
                    $getDates = "SELECT DISTINCT(date) FROM screening";
                    $resultsDates = mysqli_query($conn, $getDates);
    
                    if (mysqli_num_rows($resultsDates) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($resultsDates)) {    
                            array_push($dateArray, $row["date"]);
                        }
                    }

                    for ($i = 0; $i < count($dateArray); $i++) {
                        if ($i == 0) {
                            echo "<li id='" .date_format(date_create($dateArray[$i]),"d-M"). "' class='active date'><h3>" .date_format(date_create($dateArray[$i]),"D, d M"). "</h3></li>";
                        }
                        else {
                            echo "<li id='" .date_format(date_create($dateArray[$i]),"d-M"). "' class='date'><h3>" .date_format(date_create($dateArray[$i]),"D, d M"). "</h3></li>";
                        }             
                    }

                    ?>
            </ul>
        </div>

        <!--TODO: print each date tab using a loop, replace ID, title of movies & timeslots (use another loop for list of movie & timeslots)-->
        <!--start php-->
        <?php
            foreach ($dateArray as $date) { 
                $print = false;
                echo "<table class='date-tab' id='" .date_format(date_create($date),"d-M"). "-tab'>";
                for($movieId = 1; $movieId < count($movieArray); $movieId++) {
                    echo "<tr><td><h3>" .$movieArray[$movieId]. "</h3></td></tr>";
                    echo "<tr class='timeslots'>";
                    $getScreening = "SELECT * FROM screening WHERE `date` = '" .$date. "' AND movieId = " .$movieId;
                    $resultsScreening = mysqli_query($conn, $getScreening);  
                    if (mysqli_num_rows($resultsScreening) > 0) {
                        // output data of each row
                        while($rowA = mysqli_fetch_assoc($resultsScreening)) {
                            $getTimes = "SELECT * FROM timeslots WHERE timeslotId  = " .$rowA["timeslotId"];
                            $resultsTimes = mysqli_query($conn, $getTimes);
                            if (mysqli_num_rows($resultsTimes) > 0) {
                                // output data of each row
                                while($rowB = mysqli_fetch_assoc($resultsTimes)) {  
                                    echo "<td><form action='get'><button name='screening' type='submit' value='" .$rowA["screeningId"]. "' formaction='seat_select.php'>" .date_format(date_create($rowB["time"]),"H:i"). "</button></form></td>";
                                }
                            }
                        }
                    }    
                    echo "</tr>";  
                }
                echo "</table>";
            }

        ?>

        <!--dummy end-->
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

