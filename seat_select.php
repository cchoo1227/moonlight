<?php 
include 'php/getMovies.php';
session_start(); ?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/booking.js"></script>
    <title>Moonlight Cinemas</title>
</head>

<body>

<!--start of navbar-->
<?php include 'navbar.php' ?>
<!--end of navbar-->

<?php 
    $screeningId = $_GET["screening"];
    $ticketType = $_GET["ticketType"];
        
    foreach ($screeningsArray as $screening) {

        if ($screening["screeningId"] == $screeningId) {

            $movieName = $movieArray[$screening["movieId"] - 1]["name"]; 
            $movieImage = $movieArray[$screening["movieId"] - 1]["image"];    
            $date = $screening["date"];
            $seatsTaken = $pieces = explode(",", $screening["seatsTaken"]);
        }

    }
    

    $seatSections = array("A", "B", "C", "D", "E");

    $query  = explode('&', $_SERVER['QUERY_STRING']);
    $params = array();

    foreach( $query as $param )
    {
    // prevent notice on explode() if $param has no '='
    if (strpos($param, '=') === false) $param += '=';

    list($name, $value) = explode('=', $param, 2);
    $params[urldecode($name)][] = urldecode($value);
    }
    
    if ($ticketType == "adult") {
        $price = 10;
    }
    elseif ($ticketType == "student") {
        $price = 6;
    }

    $totalPrice = $price * count($params["seats"]);
    $seats = $params["seats"];
    $time = $screeningsArray[$screeningId-1]["time"];

    $cartItem = array("ticketType" => $ticketType, "totalPrice" => $totalPrice, "seats" => $seats, "movieName" => $movieName, "date" => $date, "time" => $time, "screeningId" => $screeningId);
    $add = true;

    foreach($cartItem as $param) {
        if ($param == NULL || $params == "") {
            $add = false;
        }
    }
    
    if ($add) {
        array_push($_SESSION['cart'], $cartItem);
        echo "added";
        
    }

?>

<div class="section" id="movie-booking"> 
    <div class="container"> 
 		
		<table class="booking-table" border="0">
		
		<tr>
            <td>
                <div class="booking-title">
                    <h1><?php echo $movieName ?></h1>
                </div>
            </td>
            <td>
            </td>
		</tr>
		
		<tr>
            <td><img src="<?php echo $movieImage ?>"></td>
            
		<td>
            <div class="booking-date">
                <h2><?php echo date("D, d M Y",strtotime($date)); ?></h2>
            </div>
        
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="seatsBookingForm">
            <input type="hidden" value="<?php echo $screeningId ?>" name="screening">
            <table class="seats-table">
		    <tr>
			<td></td>
			<td colspan="10"><div style="width:240px;height:25px;border:1px solid #EBEBEB;text-align:center;">Screen</div><td>
		    </tr>
            <tr></tr>
            <?php foreach($seatSections as $section): ?>
                <tr>
                    <?php 
                    
                        echo "<td>" .$section. "</td>";

                        for ($i = 1; $i <= 10; $i++) {

                            $taken = false;

                            $singleSeat = $section.$i;

                            foreach($seatsTaken as $takenSeat) {

                                if ($takenSeat == $singleSeat) {
                                    $taken = true;
                                }
                            }

                            if ($taken) {
                                echo "<td><input type='checkbox' disabled></td>";
                            }

                            else {
                                echo "<td><input type='checkbox' id=" .$singleSeat. " name='seats' value= " .$singleSeat. "></td>";
                            }
                                
                        }
                    
                    ?>
                </tr>
            <?php endforeach; ?>
			<tr>
			    <td></td>
			    <td style="text-align: center">1</td>
				<td style="text-align: center">2</td>
				<td style="text-align: center">3</td>
				<td style="text-align: center">4</td>
				<td style="text-align: center">5</td>
				<td style="text-align: center">6</td>
				<td style="text-align: center">7</td>
				<td style="text-align: center">8</td>
				<td style="text-align: center">9</td>
                <td style="text-align: center">10</td>                
			</tr>
	        </table>
            <div>
                <label for="ticketType">Choose Ticket Type:</label>
                <select required id="ticketType" name="ticketType">
                    <option selected value="adult">Adult</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <div>Seats Chosen: <span id="printedSeats">-</span> </div>
            <div>Total Cost: <span id="totalCost">-</span></div>
            <div><button type="submit">Add to Cart</div>
			</td>
            </tr>
        </table>
        </form>

</div> 
<!--end of main content-->



<!--start of footer-->
<?php include 'footer.php' ?>
<!--end of footer-->
<?php mysqli_close($conn); ?>
<script src="scripts/bookingR.js"></script>
</body>

