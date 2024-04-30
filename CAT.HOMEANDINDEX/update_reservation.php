<?php
include('database_connection.php');

// Check if reservation_id is set
if(isset($_REQUEST['reservation_id'])) {
    $rid = $_REQUEST['reservation_id'];
    
    $stmt = $connection->prepare("SELECT * FROM reservation WHERE reservation_id=?");
    $stmt->bind_param("i", $rid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['reservation_id'];
        $y = $row['user_idd'];
        $z = $row['flight_id'];
        $w = $row['passenger_name'];
    } else {
        echo "Reservation not found.";
    }
}
?> 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update reservation</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update reservation form -->
    <h2><u>Update Form of reservation</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="user_idd">User ID:</label>
        <input type="number" name="user_idd" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="flight_id">Flight ID:</label>
        <input type="text" name="flight_id" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="passenger_name">Passenger Name:</label>
        <input type="text" name="passenger_name" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
include('database_connection.php');
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $uidd = $_POST['user_idd'];
    $fid  = $_POST['flight_id'];
    $pname = $_POST['passenger_name'];
    
    // Update the reservation in the database
    $stmt = $connection->prepare("UPDATE reservation SET user_idd=?, flight_id=?, passenger_name=? WHERE reservation_id=?");
    $stmt->bind_param("sssi", $uidd, $fid, $pname, $rid);
    $stmt->execute();
    
    // Redirect to reservation.php
    header('Location: reservation.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
