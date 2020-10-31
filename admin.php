<?php include 'getMovies.php';?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/admin.js"></script>
</head>

<body>

<?php 




?>

<!--start of navbar-->
<div id="nav">
    <div class="container">
        <img src="images/logo_light.svg">
        <ul>
            <li><h2 style="display:inline-block; margin-right: 30px;">Admin Page</h2></li>
            <li><button>Logout</button></li>
        </ul>
    </div>
</div>
<!--end of navbar-->

<!--start of main content-->
<div class="section all-movies"> 
    
    <div class="container">
        <div class="flex admin-movie-info">
            <div>
                <h2>ADD NEW MOVIE</h2>
                <form action="addMovie.php" method="post">
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
                    <button formaction="modifyMovie.php" type="submit">Modify Movie</button>
                    <button formaction="deleteMovie.php" type="submit">Delete Movie</button>
                 </form>
            </div>
            <div>
                <h2>ADD COMING SOON MOVIE TO NOW SHOWING</h2>
                <form action="changeComingSoon.php" method="post">
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
            <form method="post" action="addScreening.php">
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
<script src="scripts/adminR.js"></script>
<?php mysqli_close($conn); ?>
</body>

