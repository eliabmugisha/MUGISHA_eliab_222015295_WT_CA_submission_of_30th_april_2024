<?php
include('database_connection.php');

// Check if airport_id is set
if(isset($_REQUEST['airport_id'])) {
    $a_id = $_REQUEST['airport_id'];
    
    $stmt = $connection->prepare("SELECT * FROM airport WHERE airport_id=?");
    $stmt->bind_param("i", $a_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $y = $row['airport_code'];
        $z = $row['ccouuntryy'];
    } else {
        echo "Airport not found.";
    }
}
?> 



<!DOCTYPE html>
<html>
<head>
    <title>Update airport</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of airport</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="airport_code">Airport Code:</label>
        <input type="text" name="airport_code" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="ccouuntryy">Country:</label>
        <input type="text" name="ccouuntryy" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
include('database_connection.php');
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $a_code = $_POST['airport_code'];
    $ccntryy  = $_POST['ccouuntryy'];
    
    // Update the airport in the database
    $stmt = $connection->prepare("UPDATE airport SET airport_code=?, ccouuntryy=? WHERE airport_id=?");
    $stmt->bind_param("ssi", $a_code, $ccntryy, $a_id);
    $stmt->execute();
    
    // Redirect to airport.php
    header('Location: airport.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
