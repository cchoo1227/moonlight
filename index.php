<?php
session_start();
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

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

//get and store movies, coming soon only once
//TODO: what is user accesses movies page before home page???

$getMovie = "SELECT * FROM movies";
$resultsMovie = mysqli_query($conn, $getMovie);
$_SESSION["movies"] = []; 

if (mysqli_num_rows($resultsMovie) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultsMovie)) {    

        array_push($_SESSION["movies"], $row);

    }
}

$getComingSoon = "SELECT image FROM comingSoon";
$resultsComingSoon = mysqli_query($conn, $getComingSoon);
$_SESSION["comingSoon"] = [];

if (mysqli_num_rows($resultsComingSoon) > 0) {
    // output data of each row
    while($rowB = mysqli_fetch_row($resultsComingSoon)) {    
        array_push($_SESSION["comingSoon"], $rowB[0]);
    }
}

?>

<!--start of navbar-->
<div id="nav">
    <div class="container">
        <a href="index.php"><img src="images/logo_light.svg"></a>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="movies.php">MOVIES</a></li>
            <li><a href="showtimes.php">SHOWTIMES</a></li>
            <li><a href="#">CONTACT</a></li>
            <li><a href="#"><img width="24px" height="24px" src="images/cart_outlined.svg"></a></li>
        </ul>
    </div>
</div>
<!--end of navbar-->

<!--start of banner-->
<!--TO WEIFAN: You can delete this entire BANNER part since you won't need it. You just need to use the MAIN CONTENT part below.-->
<div id="banner">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
        <div class="container">
            <div class="title">Tenet</div>
            <div class="subtitle">In this action thriller, a secret agent embarks on a dangerous, time-bending mission to prevent the start of World War III.</div>
        </div>
    </div>
  
    <div class="mySlides fade">
        <div class="container">
            <div class="title">Parasite</div>
            <div class="subtitle">Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.</div>
        </div>
    </div>
  
    <div class="mySlides fade">
        <div class="container">
            <div class="title">Mulan</div>
            <div class="subtitle">To save her ailing father from serving in the Imperial Army, a fearless young woman disguises herself as a man to battle northern invaders in China.</div>
        </div>
    </div>
  
</div>
<!--end of banner-->

<!--start of main content-->
<div class="section" id="now-showing"> <!--TO WEIFAN: This is a 'SECTION' div. Use one 'SECTION' div for every horizontal section of content. E.g. I used one section for 'Now Showing' and another section for 'Coming Soon'.-->
    <div class="container"> <!--TO WEIFAN: This is a 'CONTAINER' div. There is one 'CONTAINER' div within every 'SECTION' div. Replace ALL the code in the 'CONTAINER' div with your own code.-->
        <div class="underlined-titles">
            <h2>NOW SHOWING</h2>
        </div>
        <div class="flex movie-posters movie-tab" id="now-showing-tab"> 
            <?php for($i = 0; $i < 4 ; $i++): ?> 
                <div>   
                    <a href="movie_details.php?movie=<?php echo $i + 1; ?>"><img src="<?php echo $_SESSION["movies"][$i]["image"]; ?>"></a>
                </div>
            <?php endfor; ?>           
        </div>
    </div>
</div>

<div class="section" id="coming-soon">
    <div class="container">
        <div class="underlined-titles dark">
            <h2>COMING SOON</h2>
        </div>
        <div class="flex movie-posters movie-tab" id="now-showing-tab"> 
            <?php for($i = 0; $i < 4 ; $i++): ?> 
                <div>   
                    <img src="<?php echo $_SESSION["comingSoon"][$i]; ?>">
                </div>
            <?php endfor; ?>           
        </div>
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

<script src="scripts/home-banner.js"></script>
</body>

