<?php 
session_start();
include 'php/getMovies.php';
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/admin.js"></script>
</head>

<body>

<!--start of navbar-->
<div id="nav">
    <div class="container">
        <img src="images/logo_light.svg">
        <ul>
            <li><h2 style="display:inline-block; margin-right: 30px;">Admin Login</h2></li>
        </ul>
    </div>
</div>
<!--end of navbar-->

<!--start of main content-->
<div class="section all-movies"> 
    
    <div class="container">
        <form method="post" action="admin.php">
            <div>Username: <input required name="username"></div>
            <div>Password: <input required type="password" name="password"></div>
            <button type="submit">Log In</button>
        </form>
    </div>  

</div>


<!--end of main content-->



<!--start of footer-->
<?php include 'footer.php' ?>

<!--end of footer-->
<script src="scripts/adminR.js"></script>
<?php mysqli_close($conn); ?>
</body>

