<?php session_start();
include 'php/getMovies.php';?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<!--start of navbar-->
<?php include 'navbar.php' ?>
<!--end of navbar-->

<?php 

$query  = explode('&', $_SERVER['QUERY_STRING']);
$params = array();

foreach( $query as $param )
{
// prevent notice on explode() if $param has no '='
if (strpos($param, '=') === false) $param += '=';

list($name, $value) = explode('=', $param, 2);
$params[urldecode($name)][] = urldecode($value);
}

$_SESSION["bookingItem"] = [];

$i = 0;

foreach ($params["selectedCart"] as $selectedCartItem) {

    $cartItem = $_SESSION["cart"][(int)$selectedCartItem];

    $seatString = implode("," , $cartItem["seats"]) ;

    array_push($_SESSION["bookingItem"], array("cartIndex" => $i, "screeningId" => $cartItem["screeningId"], "ticketType" => $cartItem["ticketType"], "totalPrice" => $cartItem["totalPrice"], "seats" => $seatString));

    $i++;

}

?>

<div class="section" id="customer-particulars">
    <div class="container"> 
        <div class="particulars-title">
            <h1>Customer Particulars</h1>
        </div>
		
        <form method="POST" action="bookingsuccess.php" id="particularsForm">
        <table class="customer-particular">
            <tr>
                <td>Name*:</td>
				<td><input type="text" name=customername size="30" id="customername" required></td>
			</tr>
			<tr>
			    <td>Date of Birth*:</td>
			    <td><input type="date" name=dateofbirth style="width: 241px" id="dateofbirth" required></td>
			</tr>
			<tr>
			    <td>Contact*:</td>
			    <td><input type="number" name=contactnumber style="width: 239px" id="contactnumber" required></td>
			</tr>
			<tr>
			    <td>Email Address*:</td>
			    <td><input type="email" name=email size="30" id="email" required></td>
			</tr>
			<tr>
			    <td></td>
			    <td style="text-align: right; padding: 15px 0"><input type="submit" class="paymentbutton" value="Proceed to Payment"></td>
			</tr>
	        </table>
		</form>
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

