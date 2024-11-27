<?php
session_start();

require '../connection.php';

if (!isset($_GET['id'])) {
    header('location:allproducts.php');
    exit;
}

$product_id = intval($_GET['id']);

$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $product_id);
$stmt->execute();
$result = $stmt->get_result();

$product = $result->fetch_assoc();
if (!$product) {
    $error = "Product not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/aboutus.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Product Details - Sneaker Hub</title>
</head>
<body>
<?php include('C:\xampp\htdocs\sneaker_hub\includes\top.php'); ?>

<?php include_once "../includes/header.php"; ?>

<div class="container">
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php else: ?>
        <h1 class="my-4" style="text-align: center;"><?php echo htmlspecialchars($product['name']); ?></h1>
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo '../admin/uploaded_img/' . htmlspecialchars($product['image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($product['name']); ?>">
            </div>
            <div class="col-md-6">
                <h3 class="my-3">Description</h3>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <h3 class="my-3">Price: $<?php echo htmlspecialchars($product['price']); ?></h3>
                <form action="insertcart.php" method="POST">
                    <input type="hidden" name="pname" value="<?php echo htmlspecialchars($product['name']); ?>">
                    <input type="hidden" name="pprice" value="<?php echo htmlspecialchars($product['price']); ?>">
                    <input type="number" name="product_quantity" min="1" max="20" placeholder="Quantity" required>
                    <br><br>
                    <input type="submit" name="addCart" class="btn btn-dark" value="Add To Cart">
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+Y5Mn0TvwAn0eMgOhuKcP6KGF9cf" crossorigin="anonymous"></script>
</body>
</html>
