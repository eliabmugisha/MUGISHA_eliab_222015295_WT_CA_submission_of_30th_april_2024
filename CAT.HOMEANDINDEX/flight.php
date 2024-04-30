<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>flight</title>
    <style>
        body {
            background-color: grey;
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        header {
            background-color: burlywood;
            padding: 20px;
        }
        section {
            padding: 71px;
            border-bottom: 1px solid #ddd;
            background-color: mediumslateblue;
        }
        footer {
            text-align: center;
            padding: 15px;
            background-color: burlywood;
        }
    </style>
</head>
<body>
<header>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
        <img src="./logo.JFIF" width="50" height="30" alt="logo">
        <a href="./home.html" style="padding: 10px; color: white; background-color: hotpink; text-decoration: none; margin-right: 15px;">HOME</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html" style="padding: 10px; color: white; background-color: hotpink; text-decoration: none; margin-right: 15px;">ABOUT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html" style="padding: 10px; color: white; background-color: hotpink; text-decoration: none; margin-right: 15px;">CONTACT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./airport.php" style="padding: 10px; color: white; background-color: hotpink; text-decoration: none; margin-right: 15px;">airport</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./flight.php" style="padding: 10px; color: white; background-color: hotpink; text-decoration: none; margin-right: 15px;">flight</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./payment.php" style="padding: 10px; color: white; background-color: hotpink; text-decoration: none; margin-right: 15px;">payment</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./reservation.php" style="padding: 10px; color: white; background-color: hotpink; text-decoration: none; margin-right: 15px;">reservation</a></li>
    
        <li class="dropdown" style="display: inline; margin-right: 10px;">
            <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
            <div class="dropdown-contents">
                <!-- Links inside the dropdown menu -->
                <a href="login.html">Login</a>
                <a href="register.html">Register</a>
                <a href="logout.php">Logout</a>
            </div>
        </li>
    </ul>
    <form class="d-flex" role="search" action="search.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</header>
<section>
    <h1>flight Form</h1>
    <form method="post" action="flight.php">
        <label for="flight_id">flight_id :</label>
        <input type="number" id="flight_id" name="flight_id" required><br><br>

        <label for="Variet">flight_number:</label>
        <input type="number" id="flight_number" name="flight_number" required><br><br>

        <label for="departure_city">departure_city:</label>
        <input type="text" id="departure_city" name="departure_city" required><br><br>

        <label for="arrival_city">arrival_city:</label>
        <input type="text" id="arrival_city" name="arrival_city" required><br><br>

         <label for="departuure_time">departuure_time:</label>
        <input type="time" id="departuure_time" name="departuure_time" required><br><br>

          <label for="arrival_time ">arrival_time :</label>
        <input type="time" id="arrival_time " name="arrival_time" required><br><br>

         <label for="aircraft ">aircraft :</label>
        <input type="text" id="aircraft " name="aircraft" required><br><br>

      
        <input type="submit" name="insert" value="Insert"><br><br>
    </form>
    <a href="./home.html">Go Back to Home</a>
    <!-- PHP Code to Insert Data -->
    <?php
    // Include the database connection file
    include('database_connection.php');

    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        // Prepare the insert statement
        $stmt = $connection->prepare("INSERT INTO flight (flight_id, flight_number,departure_city,arrival_city,departuure_time,arrival_time,aircraft ) VALUES (?, ?, ?,?,?,?,?)");
        $stmt->bind_param("issssss", $fid, $fnumber, $dcity,$acity,$dtime,$atime,$acft);
        // Set parameters from POST and execute
        $fid = $_POST['flight_id'];
        $fnumber = $_POST['flight_number'];
        $dcity = $_POST['departure_city'];
        $acity = $_POST['arrival_city'];
        $dtime = $_POST['departuure_time'];
        $atime = $_POST['arrival_time'];
        $acft = $_POST['aircraft'];
        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
        $stmt->close();
    }

    // Fetch data from the flight table
    $sql = "SELECT * FROM flight";
    $result = $connection->query($sql);
    ?>
    <!-- Displaying Table of flight -->
    <center><h2>Table of flight</h2></center>
    <table>
        <tr>
            <th>flight_id</th>
            <th>flight_number</th>
            <th>departure_city</th>
            <th>arrival_city</th>
            <th>departuure_time</th>
            <th>arrival_time</th>
            <th>aircraft</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include('database_connection.php');
        // Check if there are any results
        if ($result->num_rows > 0) { 
            // Loop through each row
            while ($row = $result->fetch_assoc()) {
                // Store the flight_id in a variable
                $fid = $row["flight_id"];
                // Output the data in table row format
                echo "<tr>
                    <td>" . $row["flight_id"] . "</td>
                    <td>" . $row["flight_number"] . "</td>
                    <td>" . $row["departure_city"] . "</td> 
                    <td>" . $row["arrival_city"] . "</td>
                    <td>" . $row["departuure_time"] . "</td>
                    <td>" . $row["arrival_time"] . "</td> 
                    <td>" . $row["aircraft"] . "</td> 
                    <td><a href='delete_flight.php?flight_id=$fid'>Delete</a></td> 
                    <td><a href='update_flight.php?flight_id=$fid'>Update</a></td> 
                </tr>";
            }
        } else {
            // If no data found, display a message
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</section>
<footer>
  <marquee><i style="color: yellow;">&copy; 2024</i><i style="color: blue;" ><b>WEB TECHNOLOGY CAT DESIGNED BY:MUGISHA eliab</b></marquee>
</footer>
</body>
</html>
