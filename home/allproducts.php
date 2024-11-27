<?php
session_start();

require '../connection.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    $error = "No products found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/aboutus.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>All Products - Sneaker Hub</title>
</head>
<body>
<?php include('C:\xampp\htdocs\sneaker_hub\includes\top.php'); ?>

<?php include_once "../includes/header.php"; ?>

<div class="container">
    <h1 class="my-4" style="text-align: center;">All Products</h1>

    <?php if (!empty($products)): ?>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card m-auto" style="width: 18rem;">
                        <img src="<?php echo '../admin/uploaded_img/' . htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title fs-4 fw-bold"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text fs-4 fw-bold">$ <?php echo htmlspecialchars($product['price']); ?></p>
                            <a href="product_details.php?id=<?php echo $product['id']; ?>" class="btn btn-dark">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+Y5Mn0TvwAn0eMgOhuKcP6KGF9cf" crossorigin="anonymous"></script>
</body>
</html>
