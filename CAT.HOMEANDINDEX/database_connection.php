<?php
// Database credentials
$hostname = "localhost";
$username = "eliab";
$password = "mugisha@2020";
$database = "airline_online_ticket_booking";

// Create connection
$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>