<?php session_start();
include 'getMovies.php';?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<!--start of navbar-->
<div id="nav">
    <div class="container">
        <img src="images/logo_light.svg">
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">MOVIES</a></li>
            <li><a href="#">SHOWTIMES</a></li>
            <li><a href="#">CONTACT</a></li>
            <li><a href="#"><img width="24px" height="24px" src="images/cart_outlined.svg"></a></li>
        </ul>
    </div>
</div>
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

foreach($params["selectedCart"] as $selectedIndex) {
    unset($_SESSION['cart'][(int)$selectedIndex]);
}

$_SESSION['cart'] = array_values($_SESSION['cart']);

?>

<div class="section" id="shopping-cart"> 
    <div class="container"> 
        <div class="cart-title">
            <h1>Shopping Cart</h1>
        </div>
		
        <form method="get" id="shoppingcartForm">
        <table class="shopping-cart" border="0">
		  <thead >
			<tr class="whiteunderline">
                
			<th id="booking" >Bookings</th>
			<th id="noOfTickets">Seats</th>
			<th id="totalPrice">Total Price</th>
			<th id="actions">Actions</th>
			
	        </tr>
			
			
		  </thead>
		  <tbody>
          <?php $i = 0; ?>
          <?php foreach($_SESSION['cart'] as $cartItem): ?>
			<tr>
            <td>
                <?php 
                
                    echo $cartItem["movieName"]. "<br>";
                    echo $cartItem["date"]. " , " .$cartItem["time"];
                
                ?>
            </td>
            <td>
                <?php 
                    foreach($cartItem["seats"] as $seat) {
                        echo $seat. " ";
                    }
                ?>
            </td>
			<td><?php echo "$" .$cartItem["totalPrice"] ?></td>
			<td><input type="checkbox" value="<?php echo $i ?>" name="selectedCart"></td>
            </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
		  </tbody>
        </table>
        <button type="submit" formaction="<?php echo $_SERVER['PHP_SELF']?>">Delete</button>
        <button type="submit" formaction="#">Make Payment</button>
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

