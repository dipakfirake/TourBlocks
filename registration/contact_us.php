<?php
$host = "localhost";
$username = "root";
$password = "";
$database= "sample";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error)
{
    die("Connection failed:" . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO Contact_Us (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";

if($conn->query($sql) === TRUE)
{
    header("Location: home.html");
    
}else{
    echo "Error" . $sql, "<br>" . $conn->error;
}

$conn->close();

?>