<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $confirmPassword = $_POST['ConfirmPassword'];


   
    $query = "INSERT INTO admins (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
      
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

 
        mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $email, $hashedPassword);
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
         
            header('Location: admin_signin.php');
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

    <title>Admin SignUp</title>
    <link rel="stylesheet" href="admin_signup.css">

    
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
            <img src="/logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
           TourBlocks
          </a>
          <span class="navbar-text">
            <a href="signup.html" class="btn btn-success"> User Sign Up</a>
          </span>
        </div>
      </nav>


    <form action="admin_signup.php" method="post">
        <h1>ADMIN SIGNUP</h1>
        <input type="text" name="FirstName" placeholder="Firstname" required value="">
        <input type="text" name="LastName" list="tech" placeholder="LastName">
        <input type="email" name="Email" placeholder="Email">
        <input type="password" name="Password" placeholder="Password">
        <input type="password" name="ConfirmPassword" placeholder="ConfirmPassword">
       
        <button type="submit"class="btn btn-success">Signup</button>

        <br>
        <br>
         <div>
        <a href="admin_signin.php" class="btn btn-success">Already have an account ? 𝑳𝒐𝒈𝑰𝒏</a>
    </div>
</form>
    
</body>
</html>