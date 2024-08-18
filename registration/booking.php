<?php
$host = "localhost";
$username = "root";
$password = "";
$database= "sample";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $package = $_POST['package'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $address = $_POST['address'];

    $query ="INSERT INTO bookings (name, email, phone, package, category, date, adults, children, address)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
mysqli_stmt_bind_param($stmt, "sssssssss", $name, $email, $phone, $package, $category, $date, $adults, $children, $address);

if (mysqli_stmt_execute($stmt)) {
  echo "<script>alert('Reservation submitted successfully!');</script>";
} else {
  echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
}

mysqli_stmt_close($stmt);
} else {
echo "<script>alert('Error in preparing statement.');</script>";
}

mysqli_close($conn);
}
?>

