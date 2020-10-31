<?php include 'getMovies.php';?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
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
<div id="banner">

<!--TODO: MAKE BANNER DYNAMIC?-->
    
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
<div class="section" id="now-showing"> 
    <div class="container"> 
        <div class="underlined-titles">
            <h2>NOW SHOWING</h2>
        </div>
        <div class="flex movie-posters movie-tab" id="now-showing-tab"> 
            <?php for($i = 0; $i < 4 ; $i++): ?> 
                <div>   
                    <a href="movie_details.php?movie=<?php echo $i + 1; ?>"><img src="<?php echo $movieArray[$i]["image"]; ?>"></a>
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
                    <img src="<?php echo $comingSoonArray[$i]['image']; ?>">
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
<?php mysqli_close($conn); ?>
</body>

