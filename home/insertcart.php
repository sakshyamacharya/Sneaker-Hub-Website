<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['pname'];
    $productPrice = $_POST['pprice'];
    $productQuantity = $_POST['product_quantity'];

    if ($productQuantity <= 0) {
        header('Location: index.php');
        exit;
    }

    $cartItem = [
        'name' => $productName,
        'price' => $productPrice,
        'quantity' => $productQuantity
    ];

    if (isset($_SESSION['cart'])) {
        $productExists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['name'] == $productName) {
                $item['quantity'] += $productQuantity;
                $productExists = true;
                break;
            }
        }

        if (!$productExists) {
            $_SESSION['cart'][] = $cartItem;
        }
    } else {
        $_SESSION['cart'] = [$cartItem];
    }

    header('Location: cart.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
