<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

require '../connection.php';

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['place_order'])) {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $total_price = 0; 
        foreach ($_SESSION['cart'] as $product) {
            $total_price += $product['price'] * $product['quantity'];
        }

        $user_id = $_SESSION['user_id'];
        $status = "pending";

        $stmt = $conn->prepare("INSERT INTO orders (user_id, total_price, status) VALUES (?, ?, ?)");
        $stmt->bind_param("ids", $user_id, $total_price, $status);

        if ($stmt->execute()) {
            
            unset($_SESSION['cart']);
            echo '<script>alert("Order placed successfully!");</script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo '<script>alert("Your cart is empty. Add items to your cart before placing an order.");</script>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include('C:\xampp\htdocs\sneaker_hub\includes\top.php'); ?>
    <?php include('C:/xampp/htdocs/sneaker_hub/includes/header.php'); ?>

    <div class="container">
        <h1>Shopping Cart</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $product) {
                            $total = $product['price'] * $product['quantity'];
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($product['name']) . '</td>';
                            echo '<td>$' . htmlspecialchars($product['price']) . '</td>';
                            echo '<td>' . htmlspecialchars($product['quantity']) . '</td>';
                            echo '<td>$' . number_format($total, 2) . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4">Your cart is empty</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div>
                <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                    <button type="submit" class="btn btn-primary" name="place_order">Place Order</button>
                <?php endif; ?>
                <a href="allproducts.php" class="btn btn-dark">Continue Shopping</a>
            </div>
        </form>
    </div>

    <?php include('C:/xampp/htdocs/sneaker_hub/includes/footer.php'); ?>

</body>
</html>
