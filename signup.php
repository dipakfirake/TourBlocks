<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $confirmPassword = $_POST['ConfirmPassword'];


    $query = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $email, $hashedPassword);
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            header('Location: signin.php');
            exit; 
        } else {
            echo "<script>alert('Signup failed. Please try again.');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error in preparing statement.');</script>";
    }

    mysqli_close($conn);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>UserSignUp</title>
    <link rel="stylesheet" href="signup.css">

    
<style>
    .navbar {
      width: 100%;
      color: #000;
    }
  </style>

</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-between">
          <a class="navbar-brand" href="#">
           TourBlocks
          </a>
          <span class="navbar-text">
            <a href="registration/admin_signup.html" class="btn btn-success">Admin Sign Up</a>
          </span>
        </div>
      </nav>


    <form action="signup.php" method="post">
        <h1>SIGNUP</h1>
        <input type="text" name="FirstName" placeholder="Firstname" required value="">
        <input type="text" name="LastName" list="tech" placeholder="LastName">
        <input type="email" name="Email" placeholder="Email">
        <input type="password" name="Password" placeholder="Password">
        <input type="password" name="ConfirmPassword" placeholder="ConfirmPassword">
       
        <button type="submit"class="btn btn-success">Signup</button>

        <br>
        <br>
         <div>
        <a href="registration/signin.php" class="btn btn-success">Already have an account ? 𝑳𝒐𝒈𝑰𝒏</a>
    </div>
</form>
    
</body>
</html>