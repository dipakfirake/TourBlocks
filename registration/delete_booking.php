<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $mysqli = new mysqli("localhost", "root", "", "sample");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();

    $stmt->close();
    $mysqli->close();

    header("Location: submit_booking.html");
    exit();
}
?>
