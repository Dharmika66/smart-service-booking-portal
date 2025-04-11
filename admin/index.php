<?php session_start(); if (!isset($_SESSION['admin'])) header('Location: login.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
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
  <a href="services.php">Manage Services</a>
  <a href="bookings.php">View Bookings</a>
  <a href="logout.php">Logout</a>
</div>
<div class="content">
  <h2>Welcome, Admin!</h2>
  <p>This is the admin control panel. Use the sidebar to manage services and view bookings.</p>
</div>
</body>
</html>