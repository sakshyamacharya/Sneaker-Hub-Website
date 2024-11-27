<?php
@include '../connection.php';

if(isset($_POST['add_product'])){
    if(isset($_POST['product_category'])) {
        $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
        $product_image_folder = 'uploaded_img/'.$product_image;

        if(empty($product_name) || empty($product_price) || empty($product_category) || empty($product_description) || empty($product_image)){
            $message[] = 'Please fill out all fields';
        } else {
            $insert = "INSERT INTO products(name, price, category_id, description, image) VALUES('$product_name', '$product_price', '$product_category', '$product_description', '$product_image')";
            $upload = mysqli_query($conn, $insert);
            if($upload){
                move_uploaded_file($product_image_tmp_name, $product_image_folder);
                $message[] = 'New product added successfully';
            } else {
                $message[] = 'Could not add the product';
            }
        }
    } else {
        $message[] = 'Product category is not set!';
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location: admin_page.php'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }
        .admin-product-form-container {
            flex: 1;
            padding: 20px;
            background-color: #f4f4f4;
            margin-right: 20px;
        }
        .product-display {
            flex: 2;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .product-display-table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-display-table th, .product-display-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .product-display-table th {
            background-color: #f9f9f9;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #333;
        }
       
        .message {
            display: block;
            padding: 10px;
            margin: 10px 0;
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>

<?php
if(isset($message)){
    foreach($message as $msg){
        echo '<span class="message">'.$msg.'</span>';
    }
}
?>


<div class="container">
    <div class="admin-product-form-container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>Add a New Product</h3>
            <input type="text" placeholder="Enter product name" name="product_name" class="box">
            <input type="number" placeholder="Enter product price" name="product_price" class="box">
            <textarea placeholder="Enter product description" name="product_description" class="box"></textarea>
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
            <select name="product_category" class="box">
                <option value="" disabled selected>Select category</option>
                <?php
                $categories_query = mysqli_query($conn, "SELECT * FROM categories");
                while($category = mysqli_fetch_assoc($categories_query)){
                    echo "<option value='".$category['id']."'>".$category['name']."</option>";
                }
                ?>
            </select>
            <input type="submit" class="btn" name="add_product" value="Add Product">
            <a href="admindashboard.php" class="btn btn-primary btn-sm mb-3">Go Back</a>

        </form>
    </div>

    <div class="product-display">
        <table class="product-display-table">
            <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php
            $select = mysqli_query($conn, "SELECT * FROM products ORDER BY updated_at DESC");
            while($row = mysqli_fetch_assoc($select)){
                ?>
                <tr>
                    <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>$<?php echo $row['price']; ?>/-</td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <?php
                        $category_id = $row['category_id'];
                        $category_result = mysqli_query($conn, "SELECT name FROM categories WHERE id = $category_id");
                        $category_row = mysqli_fetch_assoc($category_result);
                        echo $category_row['name'];
                        ?>
                    </td>
                    <td>
                        <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
                        <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
                    