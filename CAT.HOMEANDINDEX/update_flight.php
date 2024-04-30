<?php
 include('database_connection.php');

// Check if VarietyID is set
if(isset($_REQUEST['flight_id'])) {
    $fid = $_REQUEST['flight_id'];
    
    $stmt = $connection->prepare("SELECT * FROM flight WHERE flight_id=?");
    $stmt->bind_param("i", $fid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['flight_id'];
        $y = $row['flight_number'];
        $z = $row['departure_city'];
        $x = $row['arrival_city'];
        $y = $row['departuure_time'];
        $z = $row['arrival_time'];
        $z = $row['aircraft'];

       
    } else {

     echo "flight not found.";
    }
}
?> 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update flight</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of flight</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="flight_number">flight_number:</label>
        <input type="number" name="flight_number" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="departure_city">departure_city:</label>
        <input type="text" name="departure_city" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

         <label for="arrival_city">arrival_city:</label>
        <input type="text" name="arrival_city" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="departuure_time">departuure_time:</label>
        <input type="time" name="departuure_time" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="arrival_time">arrival_time:</label>
        <input type="time" name="arrival_time" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="aircraft">aircraft:</label>
        <input type="text" name="aircraft" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
include('database_connection.php');
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $fnumber = $_POST['flight_number'];
    $dcity  = $_POST['departure_city'];
    $acity = $_POST['arrival_city'];
    $dtime  = $_POST['departuure_time'];
    $atime  = $_POST['arrival_time'];
    $acrft  = $_POST['aircraft'];
    
    // Update the flight in the database
    $stmt = $connection->prepare("UPDATE flight SET flight_number=?,departure_city=?,arrival_city=?,departuure_time=?,arrival_time=?,aircraft=? WHERE flight_id=?");
    $stmt->bind_param("sssssss", $fnumber, $dcity , $acity,$dtime,$atime,$acrft,$fid);
    $stmt->execute();
    
    // Redirect to flight.php
    header('Location: flight.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
