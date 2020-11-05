<?php include 'php/getMovies.php';?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/tabs.js"></script>
    <title>Moonlight Cinemas</title>
</head>

<body>
<!--start of navbar-->
<?php include 'navbar.php' ?>
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
            <?php foreach($movieArray as $movie): ?> 
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
            <?php foreach($comingSoonArray as $comingSoon): ?> 
                <div>   
                    <img src="<?php echo $comingSoon['image']; ?>">
                </div>
            <?php endforeach; ?> 
        </div>
    </div>
</div>

<!--end of main content-->



<!--start of footer-->
<?php include 'footer.php' ?>
<!--end of footer-->
<?php mysqli_close($conn); ?>
<script src="scripts/moviesR.js"></script>
</body>

