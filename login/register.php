<?php
include '../connection.php';

$admin_username = 'admin';
$admin_email = 'admin@gmail.com';
$admin_password = 'admin';
$admin_role = 'admin';

$hashed_password = password_hash($admin_password, PASSWORD_BCRYPT);

$select_admin = mysqli_query($conn, "SELECT * FROM users WHERE email='$admin_email'") or die('Query failed');

if (mysqli_num_rows($select_admin) == 0) {
    $insert_admin = mysqli_query($conn, "INSERT INTO users (username, email, password, role) VALUES ('$admin_username', '$admin_email', '$hashed_password', '$admin_role')") or die('Query failed');
}

if (isset($_POST['submit-btn'])) {
    $name = mysqli_real_escape_string($conn, filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    $email = mysqli_real_escape_string($conn, filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = mysqli_real_escape_string($conn, filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $cpassword = mysqli_real_escape_string($conn, filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING));
    $user_type = 'customer'; 

    $select_user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'") or die('Query failed');

    if (mysqli_num_rows($select_user) > 0) {
        $message[] = 'User already exists';
    } else {
        if ($password != $cpassword) {
            $message[] = 'Passwords do not match';
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            mysqli_query($conn, "INSERT INTO users (username, email, password, role) VALUES ('$name', '$email', '$hashed_password', '$user_type')") or die('Query failed');
            $message[] = 'Registered successfully';
            header('location:login.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../styles/register.css">
    <title>Register Page</title>
</head>
<body>
    <section class="form-container">
        <?php 
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="message"><span>' . $msg . '</span><i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i></div>';
            }
        }
        ?>
        <form method="post">
            <h1>Register Now</h1>
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="password" name="cpassword" placeholder="Confirm your password" required>
            <input type="submit" name="submit-btn" value="Register Now" class="btn">
            <p>Already have an account? <a href="login.php">Login Now</a></p>
        </form>
    </section>
</body>
</html>





