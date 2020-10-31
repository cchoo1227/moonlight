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
<?php include 'footer.php' ?>
<!--end of footer-->
<?php mysqli_close($conn); ?>
<script src="scripts/home-banner.js"></script>
</body>

