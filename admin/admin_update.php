<?php
@include '../connection.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_category_id = $_POST['product_category_id'];
    $product_description = $_POST['product_description'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;

    if(empty($product_name) || empty($product_price) || empty($product_category_id) || empty($product_description) || empty($product_image)){
        $message[] = 'please fill out all fields!';
    } else {
        $update_data = "UPDATE products SET name='$product_name', price='$product_price', category_id='$product_category_id', description='$product_description', image='$product_image', updated_at=NOW() WHERE id = '$id'";
        $upload = mysqli_query($conn, $update_data);

        if($upload){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            header('location:admin_page.php');
        } else {
            $message[] = 'could not update the product!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            justify-content: center;
            width: 80%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 20px;
        }
        .admin-product-form-container {
            width: 100%;
            padding: 20px;
        }
        .message {
            display: block;
            padding: 10px;
            margin: 10px 0;
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
            border-radius: 5px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: black;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
       
        .title {
            font-size: 30px;
            margin-bottom: 20px;
        }
        .box {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        select.box {
            width: 100%;
        }
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
    <title>Update Product</title>
</head>
<body>

<?php
if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }
}
?>

<div class="container">
    <div class="admin-product-form-container centered">
        <?php
        $select = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
        while($row = mysqli_fetch_assoc($select)){
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h3 class="title">UPDATE THE PRODUCT</h3>
                <input type="text" class="box" name="product_name" value="<?php echo $row['name']; ?>" placeholder="enter the product name">
                <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['price']; ?>" placeholder="enter the product price">
                <textarea class="box" name="product_description" placeholder="enter the product description"><?php echo $row['description']; ?></textarea>
                <input type="file" class="box" name="product_image" accept="image/png, image/jpeg, image/jpg">

                <select name="product_category_id" class="box">
                    <option value="" disabled selected>select category</option>
                    <?php
                    $categories_query = mysqli_query($conn, "SELECT * FROM categories");
                    while($category = mysqli_fetch_assoc($categories_query)){
                        $selected = ($row['category_id'] == $category['id']) ? 'selected' : '';
                        echo "<option value='".$category['id']."' $selected>".$category['name']."</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Update Product" name="update_product" class="btn">
                <a href="admin_page.php" class="btn">Get Back!</a>
            </form>
        <?php } ?>
    </div>
</div>

</body>
</html>
