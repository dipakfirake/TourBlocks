<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "sample"; 
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $id);

    $id = $_GET['id'];

    if ($stmt->execute() === TRUE) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "ID parameter is missing!";
}

$conn->close();
?>
