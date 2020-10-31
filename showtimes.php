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

                    $dateArray = [];
                    $getDates = "SELECT DISTINCT(date) FROM screening ORDER BY `date` ASC";
                    $resultsDates = mysqli_query($conn, $getDates);
                    if (mysqli_num_rows($resultsDates) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($resultsDates)) {    
                            if (strtotime($row["date"]) > strtotime('now')) {
                                array_push($dateArray, $row["date"]);
                            }
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

        <?php

            foreach ($dateArray as $date) {

                echo "<table class='date-tab' id='" .date_format(date_create($date),"d-M"). "-tab'>";

                foreach ($movieArray as $movie) {

                    $timeslots = [];

                    echo "<tr><td><h3>" .$movie["name"]. "</h3></td></tr>";
                    echo "<tr class = 'timeslots'>";

                    foreach ($screeningsArray as $screening) {
                    
                        if (($screening["movieId"] == $movie["movieId"]) && ($screening["date"] == $date)) {
                            array_push($timeslots, $screening["screeningId"]);
                        }
    
                    }

                                        
                    foreach ($timeslots as $timeslot) {

                        foreach ($screeningsArray as $screening) {

                            if ($screening["screeningId"] == $timeslot) {

                                echo "<td><form action='get'><button name='screening' type='submit' value='" .$screening["screeningId"]. "' formaction='seat_select.php'>Screen " .$screening["screen"]. ", " .date_format(date_create($screening["time"]),"H:i"). "</button></form></td>";

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

