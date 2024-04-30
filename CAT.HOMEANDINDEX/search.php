<?php
// Include the database connection file
include('database_connection.php');

// Check if search term is provided
if (isset($_GET['query'])) {
    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Perform the search query for airports
    $sql_airport = "SELECT * FROM airport WHERE ccouuntryy LIKE '%$searchTerm%'";
    $result_airport = $connection->query($sql_airport);

    // Perform the search query for flights
    $sql_flight = "SELECT * FROM flight WHERE arrival_city LIKE '%$searchTerm%'";
    $result_flight = $connection->query($sql_flight);

    // Perform the search query for payment
    $sql_payment = "SELECT * FROM payment WHERE transaction_amount LIKE '%$searchTerm%'";
    $result_payment = $connection->query($sql_payment);

    // Perform the search query for reservation
    $sql_reservation = "SELECT * FROM reservation WHERE passenger_name LIKE '%$searchTerm%'";
    $result_reservation = $connection->query($sql_reservation);

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";
    
    // Display airports
    echo "<h3>Airports:</h3>";
    if ($result_airport->num_rows > 0) {
        while ($row = $result_airport->fetch_assoc()) {
            echo "<p>" . $row['ccouuntryy'] . "</p>";
        }
    } else {
        echo "<p>No airports found matching the search term: " . $searchTerm . "</p>";
    }

    // Display flights
    echo "<h3>Flights:</h3>";
    if ($result_flight->num_rows > 0) {
        while ($row = $result_flight->fetch_assoc()) {
            echo "<p>" . $row['arrival_city'] . "</p>";
        }
    } else {
        echo "<p>No flights found matching the search term: " . $searchTerm . "</p>";
    }

    // Display payment
    echo "<h3>Payment:</h3>";
    if ($result_payment->num_rows > 0) {
        while ($row = $result_payment->fetch_assoc()) {
            echo "<p>" . $row['transaction_amount'] . "</p>";
        }
    } else {
        echo "<p>No payments found matching the search term: " . $searchTerm . "</p>";
    }

    // Display reservation
    echo "<h3>Reservation:</h3>";
    if ($result_reservation->num_rows > 0) {
        while ($row = $result_reservation->fetch_assoc()) {
            echo "<p>" . $row['passenger_name'] . "</p>";
        }
    } else {
        echo "<p>No reservations found matching the search term: " . $searchTerm . "</p>";
    }

    // Close the database connection
    $connection->close();
} else {
    echo "No search term was provided.";
}
?>
