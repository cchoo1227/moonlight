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

$servername = "localhost";
$username = "f38ee";
$password = "f38ee";
$dbname = "f38ee";

// Escape user inputs for security
$customername = mysqli_real_escape_string($conn, $_REQUEST['customername']);
$dateofbirth = mysqli_real_escape_string($conn, $_REQUEST['dateofbirth']);
$contactnumber = mysqli_real_escape_string($conn, $_REQUEST['contactnumber']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$transactionKey = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT); //generate random 8 digit number to serve as unique transaction key (primary key)


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//store selected cart items into booking
if (!empty($_SESSION["bookingItem"])) {

    $bookingsMade = 0; //check how many bookings were made for this transaction

    foreach ($_SESSION["bookingItem"] as $bookingItem) {

        $storeBooking = "INSERT INTO bookings (ticketType, totalPrice, screeningId, seats, transactionKey) VALUES ('" .$bookingItem['ticketType']. "'," .$bookingItem['totalPrice']. "," .$bookingItem['screeningId']. ",'" .$bookingItem['seats']. "','" .$transactionKey. "')";

        if(mysqli_query($conn, $storeBooking)){
            
            //remove booking items from cart
            unset($_SESSION['cart'][(int)$bookingItem["cartIndex"]]);

            foreach ($screeningsArray as $screening) {

                //update taken seats
                if ($screening["screeningId"] == $bookingItem['screeningId'] ) {

                    $getTakenSeats = "SELECT seatsTaken FROM screening WHERE screeningId = " .$bookingItem['screeningId'];

                    $resultsTakenSeats = mysqli_query($conn, $getTakenSeats);
                    $takenSeatString = "";
                    if (mysqli_num_rows($resultsTakenSeats) > 0) {
                        // output data of each row
                        while($rowF = mysqli_fetch_assoc($resultsTakenSeats)) {    
                            $takenSeatString = $rowF["seatsTaken"];
                        }
                    }

                    if (($takenSeatString != "") || ($takenSeatString != null) ) {
                        $newTakenSeatString = "'" .$takenSeatString . "," .$bookingItem['seats']. "'";
                    }
                    else {
                        $newTakenSeatString = "'" .$bookingItem['seats']. "'";
                    }

                    $updateTakenSeats = "UPDATE screening SET seatsTaken = " .$newTakenSeatString. " WHERE screeningId = " .$bookingItem['screeningId'];
                    mysqli_query($conn, $updateTakenSeats);

                }
            
            }

        }
        else {
            echo "<h2>Booking failed. Please try again.</h2><br> <a href='cart.php' class='button'>Back to Cart</a>";
            exit();
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);

}

//get customer's booking items in bookings table
$bookingIds = [];
$getBookings = "SELECT bookingId from bookings where transactionKey = '" .$transactionKey. "'" ;
$resultsBookings = mysqli_query($conn, $getBookings);

if (mysqli_num_rows($resultsBookings) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($resultsBookings)) {    
            array_push($bookingIds, $row["bookingId"]);
    }
}

$bookingIdsString = implode("," , $bookingIds);

//store customer info together with their bookings
$sql = "INSERT INTO particulars(bookingarray, customername, dateofbirth, contactnumber, email, transactionKey) VALUES ('" .$bookingIdsString. "','" .$customername. "','" .$dateofbirth. "', '" .$contactnumber. "','" .$email. "','" .$transactionKey. "')";
if(mysqli_query($conn, $sql)){
    
    echo "<h2>Records added successfully.</h2>";

//send email
$emailMessage = "";

$j = 1;

foreach ($_SESSION["bookingItem"] as $bookingItem) {
    
    $emailMessage = $emailMessage. "Booking No. " .$j. " - Movie: " .$movieArray[$screeningsArray[$bookingItem["screeningId"]-1]["movieId"]-1]["name"]. ", Time: " .$screeningsArray[$bookingItem["screeningId"]-1]["time"]. ", Date: " .$screeningsArray[$bookingItem["screeningId"]-1]["date"]. ", Seats: " .$bookingItem["seats"]. "\r\n";
    $j++;
}


$emailHeader = "Hi " .$customername. "! Thanks for booking with Moonlight Cinemas. Please see below for your booking details.";

        $to      = 'f38ee@localhost';
    $subject = 'Booking Confimration';
    $message = $emailHeader. "\r\n" .$emailMessage;
    $headers = 'From: f38ee@localhost' . "\r\n" .
        'Reply-To: f38ee@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers,'-ff38ee@localhost');
    echo ("An confirmation email has been sent to : ".$to);
    
    unset($_SESSION["bookingItem"]);

} else{
    echo "<h2>Booking failed. Please try again.</h2><br> <a href='cart.php' class='button'>Back to Cart</a>";
}

?>

<!--end of main content-->



<!--start of footer-->
<?php include 'footer.php' ?>
<!--end of footer-->
<?php mysqli_close($conn); ?>
</body>

