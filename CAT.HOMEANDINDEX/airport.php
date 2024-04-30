<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>airport</title>
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
    <h1>airport Form</h1>
    <form method="post">
        <label for="airport_id">airport_id :</label>
        <input type="number" id="airport_id" name="airport_id" required><br><br>
        <label for="airport_code">airport_code:</label>
        <input type="number" id="airport_code" name="airport_code" required><br><br>
        <label for="ccouuntryy">ccouuntryy:</label>
        <input type="text" id="ccouuntryy" name="ccouuntryy" required><br><br>
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
        $stmt = $connection->prepare("INSERT INTO airport (airport_id, airport_code, ccouuntryy) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $a_id, $a_code, $ccntryy);
        // Set parameters from POST and execute
        $a_id = $_POST['airport_id'];
        $a_code = $_POST['airport_code'];
        $ccntryy = $_POST['ccouuntryy'];
        if ($stmt->execute()) {
            echo "New record has been added successfully.<br><br>";
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
        $stmt->close();
    }

    // Fetch data from the airport table
    $sql = "SELECT * FROM airport";
    $result = $connection->query($sql);
    ?>
    <!-- Displaying Table of airport -->
    <center><h2>Table of airport</h2></center>
    <table>
        <tr>
            <th>airport_id</th>
            <th>airport_code</th>
            <th>ccouuntryy</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include('database_connection.php');
        // Check if there are any results
        if ($result->num_rows > 0) { 
            // Loop through each row
            while ($row = $result->fetch_assoc()) {
                // Store the airport_id in a variable
                $a_id = $row["airport_id"];
                // Output the data in table row format
                echo "<tr>
                    <td>" . $row["airport_id"] . "</td>
                    <td>" . $row["airport_code"] . "</td>
                    <td>" . $row["ccouuntryy"] . "</td> 
                    <td><a href='delete_airport.php?airport_id=$a_id'>Delete</a></td> 
                    <td><a href='update_airport.php?airport_id=$a_id'>Update</a></td> 
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
