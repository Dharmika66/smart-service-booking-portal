<?php
session_start();
if (!isset($_SESSION['admin'])) header('Location: login.php');
include '../includes/db.php';

// Handle add service
if (isset($_POST['add'])) {
  $title = $_POST['title'];
  $stmt = $conn->prepare("INSERT INTO services (title) VALUES (?)");
  $stmt->bind_param("s", $title);
  $stmt->execute();
  $msg = "Service added successfully!";
}

// Handle delete
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM services WHERE id = $id");
  $msg = "Service deleted!";
}

$result = $conn->query("SELECT * FROM services");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Services</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { display: flex; }
    .sidebar {
      width: 220px;
      height: 100vh;
      background: #343a40;
      color: white;
      position: fixed;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 15px;
      border-bottom: 1px solid #444;
    }
    .content {
      margin-left: 220px;
      padding: 20px;
      width: 100%;
    }
  </style>
</head>
<body>
<div class="sidebar">
  <h4 class="text-center py-3 border-bottom">Admin</h4>
  <a href="index.php">Dashboard</a>
  <a href="services.php" class="bg-secondary">Manage Services</a>
  <a href="bookings.php">View Bookings</a>
  <a href="logout.php">Logout</a>
</div>
<div class="content">
  <h2>Manage Services</h2>
  <?php if (isset($msg)): ?>
    <div class="alert alert-success"><?= $msg ?></div>
  <?php endif; ?>
  <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add New Service</button>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Service Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td>
          <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this service?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- Add Service Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="title" class="form-control" placeholder="Service Title" required>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add" class="btn btn-success">Add Service</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>