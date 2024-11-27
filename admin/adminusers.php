<?php
require_once '../connection.php';

$sql = "SELECT id, username, email, role, created_at FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <div class="container my-5">
    <h1>User Details</h1>
    <a href="admindashboard.php" class="btn btn-primary btn-sm mb-3">Go Back</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo $row["username"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td><?php echo $row["role"]; ?></td>
          <td><?php echo $row["created_at"]; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</body>
</html>

<?php
$conn->close();
?>
