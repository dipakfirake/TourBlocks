<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli("localhost", "root", "", "sample");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO bookings (name, email, phone, package, category, booking_date, num_adults, num_children, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die('Error in preparing statement.');
    }

    $stmt->bind_param("ssssssiss", $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['package'], $_POST['category'], $_POST['date'], $_POST['adults'], $_POST['children'], $_POST['address']);

    if ($stmt->execute()) {
        header("Location: home.html");
        exit();
    } else {
        echo "Error: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
