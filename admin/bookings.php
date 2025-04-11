<?php
session_start();
if (!isset($_SESSION['admin'])) header('Location: login.php');
include '../includes/db.php';

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM bookings WHERE id = $id");
  $msg = "Booking deleted successfully!";
}

$query = "SELECT b.id, b.name AS client_name, s.title AS service, b.preferred_date, b.booked_at
          FROM bookings b
          JOIN services s ON b.service_id = s.id
          ORDER BY b.booked_at DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Bookings</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
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
  <a href="services.php">Manage Services</a>
  <a href="bookings.php" class="bg-secondary">View Bookings</a>
  <a href="logout.php">Logout</a>
</div>

<div class="content">
  <h2>All Bookings</h2>
  <?php if (isset($msg)): ?>
    <div class="alert alert-success"><?= $msg ?></div>
  <?php endif; ?>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Client Name</th>
        <th>Service</th>
        <th>Preferred Date</th>
        <th>Booked At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($row['client_name']) ?></td>
          <td><?= htmlspecialchars($row['service']) ?></td>
          <td><?= $row['preferred_date'] ?></td>
          <td><?= $row['booked_at'] ?></td>
          <td>
            <a href="?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this booking?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>