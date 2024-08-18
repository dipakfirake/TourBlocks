<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bookings</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .side-panel {
            background-color: #343a40;
            color: white;
            padding: 20px;
            height: 100vh; 
            position: fixed;
            left: 0;
            top: 0;
            width: 200px;
        }

        .side-panel a {
            color: white;
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .main-content {
            margin-left: 220px; 
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="side-panel">
    <h2>Menu</h2>
    <a href="admin.html">Admin Home</a>
    <a href="sample.php">Registered Users</a>
    <a href="fetch_bookings.php">Bookings</a>
    <a href="#">Feedback</a>
    <a href="fetch_contact.php">Contact Us</a>
    <a href="signup.php">Users Signup</a>
    <a href="home.html">Website Home</a>
</div>

<div class="main-content">
    <?php
    $mysqli = new mysqli("localhost", "root", "", "sample");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT * FROM bookings";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Package</th><th>Category</th><th>Booking Date</th><th>No. of Adults</th><th>No. of Children</th><th>Address</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["phone"]."</td>";
            echo "<td>".$row["package"]."</td>";
            echo "<td>".$row["category"]."</td>";
            echo "<td>".$row["booking_date"]."</td>";
            echo "<td>".$row["num_adults"]."</td>";
            echo "<td>".$row["num_children"]."</td>";
            echo "<td>".$row["address"]."</td>";
            echo "<td><a href='edit_booking.php?id=".$row["id"]."'>Edit</a> | <a href='delete_booking.php?id=".$row["id"]."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $mysqli->close();
    ?>
</div>

</body>
</html>
