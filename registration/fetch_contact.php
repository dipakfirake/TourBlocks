<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "sample";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

$selectQuery = "SELECT * FROM contact_us";
$result = $conn->query($selectQuery);

if (!$result) {
    die("Query failed:" . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        table {
            width: 100%;
            border: 2px solid black;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: gray;
        }

        tr:nth-child(even) {
            background-color: lightgray;
        }

        .side-panel {
            background-color: #343a40;
            color: white;
            padding: 20px;
            height: 100vh; 
            position: fixed;
            left: 0;
            top: 0;
        }

        .side-panel a {
            color: white;
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
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
        <a href="signup.php">Users Signup </a>
        <a href="home.html">Website Home</a>
    </div>

    <h2>User data</h2>
    <table>
        <tr>
            <th>Sr.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>
        <?php
        $SrNo = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$SrNo}</td>";
            echo "<td>{$row["name"]}</td>";
            echo "<td>{$row["email"]}</td>";
            echo "<td>{$row["phone"]}</td>";
            echo "<td>{$row["subject"]}</td>";
            echo "<td>{$row["message"]}</td>";
            echo "</tr>";
            $SrNo++;
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
</body>
</html>
