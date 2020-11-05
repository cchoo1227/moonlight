<?php include 'php/getMovies.php';
session_start();
$_SESSION['cart'] = [];
$_SESSION['booking'] = [];?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Moonlight Cinemas</title>
</head>

<body>
<!--start of navbar-->
<?php include 'navbar.php' ?>
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
                <?php if($movieArray[$i]['image'] !== null): ?>
                    <div>   
                        <a href="movie_details.php?movie=<?php echo $i + 1; ?>"><img src="<?php echo $movieArray[$i]["image"]; ?>"></a>
                    </div>
                <?php endif; ?>  
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
                <?php if($comingSoonArray[$i]['image'] !== null): ?>
                    <div>   
                        <img src="<?php echo $comingSoonArray[$i]['image']; ?>">
                    </div>
                <?php endif; ?>
            <?php endfor; ?>           
        </div>
    </div>
</div>

<!--end of main content-->



<!--start of footer-->
<?php include 'footer.php' ?>
<!--end of footer-->

<script src="scripts/home-banner.js"></script>
<?php mysqli_close($conn); ?>
</body>

