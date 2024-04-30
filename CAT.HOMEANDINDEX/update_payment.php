<?php
include('database_connection.php');

// Check if payment_id is set
if(isset($_REQUEST['payment_id'])) {
    $pid = $_REQUEST['payment_id'];
    
    $stmt = $connection->prepare("SELECT * FROM payment WHERE payment_id=?");
    $stmt->bind_param("i", $pid); // Corrected variable name
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['reservation_id'];
        $z = $row['transaction_amount'];
        $w = $row['payment_method']; // Corrected variable name
    } else {
        echo "Payment not found.";
    }
}
?> 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update payment</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update payment form -->
    <h2><u>Update Form of payment</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="reservation_id">Reservation ID:</label>
        <input type="number" name="reservation_id" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="transaction_amount">Transaction Amount:</label>
        <input type="number" name="transaction_amount" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="payment_method">Payment Method:</label>
        <input type="text" name="payment_method" value="<?php echo isset($w) ? $w : ''; ?>"> <!-- Corrected variable name -->
        <br><br>

        <input type="submit" name="up" value="Update">
        <input type="hidden" name="payment_id" value="<?php echo $pid; ?>"> <!-- Add hidden field for payment_id -->
    </form>
</body>
</html>

<?php
include('database_connection.php');
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $rid = $_POST['reservation_id'];
    $ta  = $_POST['transaction_amount'];
    $pm = $_POST['payment_method'];
    $pid = $_POST['payment_id']; // Retrieve payment_id
    
    // Update the payment in the database
    $stmt = $connection->prepare("UPDATE payment SET reservation_id=?, transaction_amount=?, payment_method=? WHERE payment_id=?");
    $stmt->bind_param("sssi", $rid, $ta, $pm, $pid); // Corrected parameter order and data type for payment_id
    $stmt->execute();
    
    // Redirect to payment.php
    header('Location: payment.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
