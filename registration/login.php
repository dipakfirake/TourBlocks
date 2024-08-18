<?php
session_start(); 

$host = "localhost";
$username = "root";
$password = "";
$database = "sample";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM signup WHERE Email = '$Email' AND Password = '$Password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['Email'] = $Email;
        header("Location: signup.php"); 
        exit();
    } else {
       
        header("Location: #");
        exit();
    }
}
?>
