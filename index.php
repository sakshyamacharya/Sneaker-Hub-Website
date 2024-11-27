 <?php
session_start();

// Include the database connection
require 'connection.php';

// Fetch products from the database
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
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Home - Sneaker Hub</title>
</head>
<body>          

    <?php include('includes/top.php'); ?>
    <?php include('includes/header.php'); ?>
    <?php include('includes/slider.php'); ?>

    <div class="container">
        <h1 class="my-4" style="text-align: center;">Our Collections</h1>

        <?php if (!empty($products)): ?>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card m-auto" style="width: 18rem;">
                            <img src="<?php echo 'admin/uploaded_img/' . htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title fs-4 fw-bold"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <p class="card-text fs-4 fw-bold">$ <?php echo htmlspecialchars($product['price']); ?></p>
                                <a href="http://localhost/sneaker_hub/home/product_details.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-dark">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>

<?php
$conn->close();
?>
