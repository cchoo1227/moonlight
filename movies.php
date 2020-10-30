<?php
session_start();
?>

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
<div class="section all-movies"> 
    <div class="container">
        <h1 class="page-title">ALL MOVIES</h1>
        <div class="movie-tabs">
            <ul>
                <li class="movie active" id="now-showing"><h2>NOW SHOWING</h2></li>
                <li id="coming-soon" class="movie"><h2>COMING SOON</h2></li>
            </ul>
        </div>
        <div class="flex movie-posters movie-tab" id="now-showing-tab"> 
            <?php foreach($_SESSION["movies"] as $movie): ?> 
                <div>   
                    <img src="<?php echo $movie['image']; ?>">
                    <h3><?php echo $movie['name']; ?></h3>
                    <div><?php echo $movie['rating']; ?></div>
                    <form>
                        <button value="<?php echo $movie['movieId'] ?>" type="submit" name="movie" formaction="movie_details.php">BUY TICKETS NOW</button>
                    </form>
                </div>
            <?php endforeach; ?>           
        </div>
        <div class="flex movie-posters movie-tab" id="coming-soon-tab">
            <?php foreach($_SESSION["comingSoon"] as $comingSoon): ?> 
                <div>   
                    <img src="<?php echo $comingSoon; ?>">
                </div>
            <?php endforeach; ?> 
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
<?php mysqli_close($conn); ?>
<script src="scripts/moviesR.js"></script>
</body>

