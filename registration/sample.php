<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Style for the side panel */
        .side-panel {
            background-color: #343a40;
            color: white;
            padding: 20px;
            height: 100vh; /* Full height */
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

        table {
            width: 100%;
            border: 2px solid black;
            border-collapse: collapse;
        }

        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }

        th:nth-child(even),
        td:nth-child(even) {
            background-color: gray;
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

    <div class="container">
        <div class="row">
            <div class="col-10">
                <?php
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "login_demo";
                $conn = new mysqli($host, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed:" . $conn->connect_error);
                }

                $selectQuery = "SELECT * FROM users";
                $result = $conn->query($selectQuery);

                if (!$result) {
                    die("Query failed:" . $conn->error);
                }
                ?>
                <h2>User data</h2>
                <table>
                    <tr>
                        <th>Sr.No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Created Time</th>
                    </tr>
                    <?php
                    $SrNo = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$SrNo}</td>";
                        echo "<td>{$row["first_name"]}</td>";
                        echo "<td>{$row["last_name"]}</td>";
                        echo "<td>{$row["email"]}</td>";
                        echo "<td>{$row["password"]}</td>";
                        echo "<td>{$row["created_at"]}</td>";
                        echo "</tr>";
                        $SrNo++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
