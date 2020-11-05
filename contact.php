<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Moonlight Cinemas</title>
</head>

<body>

<!--start of navbar-->
<?php include 'navbar.php' ?>
<!--end of navbar-->

<div class="section" id="contact-us"> <!--TO WEIFAN: This is a 'SECTION' div. Use one 'SECTION' div for every horizontal section of content. E.g. I used one section for 'Now Showing' and another section for 'Coming Soon'.-->
    <div class="container"> <!--TO WEIFAN: This is a 'CONTAINER' div. There is one 'CONTAINER' div within every 'SECTION' div. Replace ALL the code in the 'CONTAINER' div with your own code.-->
        <div class="contact-title">
            <h1>Contact Us</h1>
        </div>
        <table class="cinema-image">
            <tr>
                <td>
                    <img src="images/cinema.jpg">
					<p> 
					Operating Hours: 8am - 12am (Closed on Mondays) <br>
					<br>
					Address: 123 Sunshine Avenue, #01-35, S123456 <br>
					Phone: +65 6876 5432 <br>
					Email: info@moonlight.com.sg <br>
					</p>
                </td>
            </tr>
        </table>
    </div>
</div> 


<!--end of main content-->



<!--start of footer-->
<?php include 'footer.php' ?>
<!--end of footer-->

<script src="scripts/home-banner.js"></script>
</body>

