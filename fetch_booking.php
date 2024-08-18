<?php
require_once("connection.php");
$query = " select * from bookings ";
$result = mysqli_query($con, $query);
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/bootstrap.css" />
    <title>View Records</title>
</head>

<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Package</th>
                            <th>Category</th>
                            <th>Booking Date</th>
                            <th>Adults</th>
                            <th>Children</th>
                            <th>Address</th>
                            <th>Booking Time</th>
                        </tr>
                        <?php
                        foreach ($rows as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['package'] . "</td>";
                            echo "<td>" . $row['category'] . "</td>";
                            echo "<td>" . $row['booking_date'] . "</td>";
                            echo "<td>" . $row['adults'] . "</td>";
                            echo "<td>" . $row['children'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['booking_time'] . "</td>";
                            echo "<td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-pencil'>Edit</a></td>";
                            echo "<td><a href='delete_booking.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>