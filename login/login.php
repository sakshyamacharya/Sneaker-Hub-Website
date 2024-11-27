<?php
include '../connection.php';

session_start();

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
    $email = mysqli_real_escape_string($conn, filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = mysqli_real_escape_string($conn, filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $select_user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'") or die('Query failed');

    if (mysqli_num_rows($select_user) > 0) {
        $row = mysqli_fetch_assoc($select_user);
        if (password_verify($password, $row['password'])) {
            if ($row['role'] == 'admin') {
                $_SESSION['admin_name'] = $row['username'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                header('Location: ../admin/admindashboard.php');
                exit();
            } else {
                $_SESSION['user_name'] = $row['username'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                header('Location: ../index.php');
                exit();
            }
        } else {
            $message[] = 'Incorrect email or password';
        }
    } else {
        $message[] = 'No user found with that email';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../styles/login.css">

    
    <title>Login Page</title>
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
            <h1>Login Now</h1>
            <div class="input-field">
                <label>Your Email</label><br>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-field">
                <label>Your Password</label><br>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <input type="submit" name="submit-btn" value="Login Now" class="btn">
            <p>Don't have an account? <a href="register.php">Register Now</a></p>
        </form>
    </section>
</body>
</html>
