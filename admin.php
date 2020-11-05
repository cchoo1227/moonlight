<?php 
session_start();
include 'php/getMovies.php';?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/admin.js"></script>
    <title>Moonlight Cinemas</title>
</head>

<body>

<?php 

if (isset($_POST["username"]) && isset($_POST["password"])) {

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $servername = "localhost";
    $usernameDB = "f38ee";
    $passwordDB = "f38ee";
    $dbname = "f38ee";
    $movie = $_GET['movie'];

    // Create connection
    $conn = mysqli_connect($servername, $usernameDB, $passwordDB, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $getAdmin = "SELECT * FROM admin WHERE username = '" .$username. "' AND `password` = '" .$password. "'";
    $resultsAdmin = mysqli_query($conn, $getAdmin);


    if (mysqli_num_rows($resultsAdmin) > 0) {

        $_SESSION["valid_admin"] = $username;

    }

}

if (isset($_POST["empty"])) {
    unset($_SESSION["valid_admin"]);
    header("Location: http://192.168.56.2/f38ee/moonlight/admin-login.php");
    exit();
}


?>

<!--start of navbar-->
<div id="nav">
    <div class="container">
        <img src="images/logo_light.svg">
        <ul>
            <li><h2 style="display:inline-block; margin-right: 30px;">Admin Page</h2></li>
            <?php if(isset($_SESSION["valid_admin"])): ?>
            <form method="post" id="logout-btn">
                <li><button name="empty" type="submit" value="true" formaction="<?php echo $_SERVER['PHP_SELF']; ?>">Logout</button></li>
            </form>
            <?php endif; ?>
        </ul>
    </div>
</div>
<!--end of navbar-->

<!--start of main content-->

<div class="section all-movies"> 
    
    <?php if(isset($_SESSION["valid_admin"])): ?>
    <div class="container">
        <div class="flex admin-movie-info">
            <div>
                <h2>ADD NEW MOVIE</h2>
                <form action="php/addMovie.php" method="post">
                    <div>Movie Type: 
                    <select required name="movieType" id="movieType">
                            <option value="movies">Now Showing</option>
                            <option value="comingSoon">Coming Soon</option>
                    </select>
                    </div>
                    <div>Movie Name: <input required name="movieName" id="movieName"></div>
                    <div>Rating: 
                        <select required name="movieRating" id="movieRating">
                            <option value="PG">PG</option>
                            <option value="PG13">PG13</option>
                            <option value="NC16">NC16</option>
                            <option value="M18">M18</option>
                            <option value="R">R</option>
                        </select>
                    </div>
                    <div>Movie Desc: <textarea required name="movieDesc" id="movieDesc"></textarea></div>
                    <div>Image URL: <input required type="url" name="movieImg" id="movieImg"></div>
                    <button type="submit">Add Movie</button>
                 </form>
            </div>
            <div>
                <h2>MODIFY / DELETE EXISTING MOVIE</h2>
                <form method="post">
                    <div>Movie Type: 
                    <select required name="movieType" id="modifyMovieType">
                            <option selected value="movies">Now Showing</option>
                            <option value="comingSoon">Coming Soon</option>
                    </select>
                    </div>
                    <div>Select Movie: 
                    <select required name="movieId" id="modify-nowShowingMovies">
                        <?php foreach($movieArray as $movie): ?>
                            <option value="<?php echo $movie['movieId']; ?>"><?php echo $movie['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select required name="comingSoonId" id="modify-comingSoonMovies">
                        <?php foreach($comingSoonArray as $comingSoon): ?>
                            <option value="<?php echo $comingSoon['comingSoonId']; ?>"><?php echo $comingSoon['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div>Movie Name: <input name="movieName" id="movieName"></div>
                    <div>Rating: 
                        <select name="movieRating" id="movieRating">
                            <option value="PG">PG</option>
                            <option value="PG13">PG13</option>
                            <option value="NC16">NC16</option>
                            <option value="M18">M18</option>
                            <option value="R">R</option>
                        </select>
                    </div>
                    <div>Movie Desc: <textarea name="movieDesc" id="movieDesc"></textarea></div>
                    <div>Image URL: <input type="url" name="movieImg" id="movieImg"></div>
                    <button formaction="php/modifyMovie.php" type="submit">Modify Movie</button>
                    <button formaction="php/deleteMovie.php" type="submit">Delete Movie</button>
                 </form>
            </div>
            <div>
                <h2>ADD COMING SOON MOVIE TO NOW SHOWING</h2>
                <form action="php/changeComingSoon.php" method="post">
                    <div>Select Movie:
                    <select required name="movieId">
                        <?php foreach($comingSoonArray as $comingSoon): ?>
                            <option value="<?php echo $comingSoon['comingSoonId']; ?>"><?php echo $comingSoon['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <button type="submit">ADD MOVIE</button>
                 </form>
            </div>
            <div>
            <h2>ADD SCREENING TO NOW SHOWING MOVIE</h2>
            <form method="post" action="php/addScreening.php">
                <div>Select Movie: 
                <select required name="movieId">
                        <?php foreach($movieArray as $movie): ?>
                            <option value="<?php echo $movie['movieId']; ?>"><?php echo $movie['name']; ?></option>
                        <?php endforeach; ?>
                </select>
                </div>
                <div>Select Date: 
                    <input required name="date" type="date">
                </div>
                <div>Select Timeslot: 
                    <select name="timeslot" required>
                    <?php foreach($timeslotArray as $timeslot): ?>
                            <option value="<?php echo $timeslot['timeslotId']; ?>"><?php echo $timeslot['time']; ?>, Screen <?php echo $timeslot['screen']; ?> </option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit">ADD SCREENING</button>
            </form>
            </div> 
            <div>
            <h2>ADD NEW ADMIN</h2>
            <form method="post" action="php/addAdmin.php">
                <div>Username: <input required name="username"></div>
                <div>Password: <input required type="password" name="password"></div>
                <div>Confirm Password: <input required type="password" name="confPassword"></div>
                <button type="submit">ADD Admin</button>
            </form>
            </div>
            <div>
            <h2>DELETE ADMIN</h2>
            <form method="post" action="php/deleteAdmin.php">
                <div>Select Admin: <select name="username">
                <?php foreach($adminArray as $admin): ?>
                            <option value="<?php echo $admin['username']; ?>"><?php echo $admin['username']; ?></option>
                <?php endforeach; ?>
                </select>
                </div>
                <div>Password: <input type="password" name="password"></div>
                <button type="submit">DELETE ADMIN</button>
            </form>
            </div>
        </div> 
    </div>  

    <?php else: ?>
    <div class="container">
        <h2>Error with log in, please try again.</h2>
        <a class="button" href="admin-login.php">Log In</a>
    </div>
    <?php endif ?>

</div>


<!--end of main content-->



<!--start of footer-->
<?php include 'footer.php' ?>

<!--end of footer-->
<script src="scripts/adminR.js"></script>
<?php mysqli_close($conn); ?>
</body>

