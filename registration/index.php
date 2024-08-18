<?php
include_once('connection.php');

if ($conn) {
    $query = "SELECT * FROM bookings";

    $result = mysqli_query($conn, $query);

    if ($result) {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Fetch Data From Database</title>
            </head>
            <body>
                <table align="center" border="1px" style="width:600px; line-height:40px;">
                    <tr>
                        <th colspan="4"><h2>Student Record</h2></th>
                    </tr>
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
                    while ($rows = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['id']; ?></td>
                            <td><?php echo $rows['Name']; ?></td>
                            <td><?php echo $rows['email']; ?></td>
                            <td><?php echo $rows['phone']; ?></td>
                            <td><?php echo $rows['package']; ?></td>
                            <td><?php echo $rows['category']; ?></td>
                            <td><?php echo $rows['booking_date']; ?></td>
                            <td><?php echo $rows['adults']; ?></td>
                            <td><?php echo $rows['children']; ?></td>
                            <td><?php echo $rows['address']; ?></td>
                            <td><?php echo $rows['booking_time']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </body>
        </html>
        <?php
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
} else {
    echo "Error connecting to database: " . mysqli_connect_error();
}

mysqli_close($conn);
?>