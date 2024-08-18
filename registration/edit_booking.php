<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea,
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Booking</h2>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "sample");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $stmt = $mysqli->prepare("UPDATE bookings SET name=?, email=?, phone=?, package=?, category=?, booking_date=?, num_adults=?, num_children=?, address=? WHERE id=?");
        $stmt->bind_param("ssssssiiis", $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['package'], $_POST['category'], $_POST['booking_date'], $_POST['num_adults'], $_POST['num_children'], $_POST['address'], $_POST['id']);

        if ($stmt->execute()) {
            echo "Booking details updated successfully.";
        } else {
            echo "Error updating booking details: " . $mysqli->error;
        }

        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM bookings WHERE id=$id";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Booking not found.";
        }
    }

    $mysqli->close();
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>"><br>

        <label for="package">Package:</label><br>
        <input type="text" id="package" name="package" value="<?php echo $row['package']; ?>"><br>

        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" value="<?php echo $row['category']; ?>"><br>

        <label for="booking_date">Booking Date:</label><br>
        <input type="date" id="booking_date" name="booking_date" value="<?php echo $row['booking_date']; ?>"><br>

        <label for="num_adults">No. of Adults:</label><br>
        <input type="number" id="num_adults" name="num_adults" value="<?php echo $row['num_adults']; ?>"><br>

        <label for="num_children">No. of Children:</label><br>
        <input type="number" id="num_children" name="num_children" value="<?php echo $row['num_children']; ?>"><br>

        <label for="address">Address:</label><br>
        <textarea id="address" name="address"><?php echo $row['address']; ?></textarea><br>

        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>
