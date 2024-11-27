<?php
session_start();

require '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_status, $order_id);

    if ($stmt->execute()) {
        echo '<script>alert("Status updated successfully!");</script>';
    } else {
        echo "Error updating status: " . $stmt->error;
    }

    $stmt->close();
}

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1>Admin Orders</h1>
        <a href="admindashboard.php" class="btn btn-primary btn-sm mb-3">Go Back</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['user_id']) . '</td>';
                        echo '<td>$' . htmlspecialchars($row['total_price']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['status']) . '</td>';
                        echo '<td>
                                <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                                    <input type="hidden" name="order_id" value="' . $row['id'] . '">
                                    <select class="form-select" name="status">
                                        <option value="pending">Pending</option>
                                        <option value="confirmed">Confirmed</option>
                                        <option value="on the way">On the Way</option>
                                        <option value="finished">Finished</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-1" name="update_status">Update</button>
                                </form>
                              </td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No orders found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

  

</body>
</html>

<?php
$conn->close();
?>
