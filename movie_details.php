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

<div class="section movie-info">
    <div class="container">
        <table>
            <tr>
            <?php 
                $movie = $_GET['movie'];
            ?>
            <td><img src="<?php echo $movieArray[$movie-1]['image']; ?>"></td>
            <td><h1><?php echo $movieArray[$movie-1]['name']; ?></h1>
            <div class='rating'><?php echo $movieArray[$movie-1]['rating']; ?></div>
            <p><?php echo $movieArray[$movie-1]['desc']; ?></p></td>
            </tr>
        </table>

        <h1 class="underlined-titles dark">SHOWTIMES</h1>
        <table class="date-tab">
            <?php

                $dateArray = [];
                $getDates = "SELECT DISTINCT(date) FROM screening WHERE movieId  = " .$movie. " ORDER BY `date` ASC";
                $resultsDates = mysqli_query($conn, $getDates);
                if (mysqli_num_rows($resultsDates) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($resultsDates)) {    
                        if (strtotime($row["date"]) > strtotime('now')) {
                            array_push($dateArray, $row["date"]);
                        }
                    }
                }

                foreach ($dateArray as $date) {

                    $timeslots = [];

                    echo "<tr><td><h3>" .date_format(date_create($date),"D, d M Y"). "</h3></td></tr>";

                    foreach ($screeningsArray as $screening) {
                        
                        if (($screening["movieId"] == $movie) && ($screening["date"] == $date)) {
                            array_push($timeslots, $screening["screeningId"]);
                        }

                    }

                    echo "<tr class = 'timeslots'>";
                    
                    foreach ($timeslots as $timeslot) {

                        foreach ($screeningsArray as $screening) {

                            if ($screening["screeningId"] == $timeslot) {

                                echo "<td><form action='get'><button name='screening' type='submit' value='" .$screening["screeningId"]. "' formaction='seat_select.php'>Screen " .$screening["screen"]. ", " .date_format(date_create($screening["time"]),"H:i"). "</button></form></td>";

                            }

                        }

                    }

                    echo "</tr>";
                    

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

