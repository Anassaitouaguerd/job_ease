<?php
session_start();
if(isset($_SESSION['messageError'])){
    $alertMessage = $_SESSION['messageError'];
    echo "<script>alert('$alertMessage');</script>";
    unset($_SESSION['messageError']);   
}
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
    <link rel="stylesheet" href="styles/registerstyle.css">
</head>

<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <form action="./controller/auth_controller.php" method="POST">
            <div class="input-box">
                <input type="text" name="username" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Create password" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Confirm password" required>
            </div>
            <div class="policy">
                <input type="checkbox">
                <h3>I accept all terms & condition</h3>
            </div>
            <div class="input-box button">
                <input type="Submit" name="register" value="Register Now">
            </div>
            <div class="text">
                <h3>Already have an account? <a href="./login.php">Login now</a></h3>
            </div>
        </form>
    </div>
</body>

</html>