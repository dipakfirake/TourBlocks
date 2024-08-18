<?php
require 'config.php';

$showAlert = false;
$alertMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $showAlert = true;
                $alertMessage = "Authentication successful. Click OK to proceed.";

                header('Location:registration/home.html');
                exit; 
            } else {
                $alertMessage = "Invalid password. Please try again.";
            }
        } else {
            $alertMessage = "User not found. Please check your email.";
        }

        mysqli_stmt_close($stmt);
    } else {
        $alertMessage = "Error in preparing statement.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
                <img src="/logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                TourBlocks
            </a>
            <span class="navbar-text">
                <a href="registration/admin_login.html"><button type="button" class="btn btn-success">Admin Login</button></a>
            </span>
        </div>
    </nav>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container mt-5">
        <h1>Login</h1>
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <button type="submit" class="btn btn-primary">Login</button>
        <br><br>
        <div>
            <a href="registration/signup.php" class="btn btn-success">Don't have an account ? Sign Up</a>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>



        <?php
        if ($showAlert) {
            echo "alert('$alertMessage');";
        }
        ?>
    </script>
</body>
</html>
