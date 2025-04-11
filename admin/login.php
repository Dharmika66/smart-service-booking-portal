<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card p-4 bg-secondary">
        <h4 class="text-center mb-3 text-white">Admin Login</h4>
        <form method="POST" action="login.php">
          <input type="text" name="username" placeholder="Username" class="form-control mb-3" required>
          <input type="password" name="password" placeholder="Password" class="form-control mb-3" required>
          <button type="submit" class="btn btn-danger w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  if ($user === "admin" && $pass === "admin123") {
    $_SESSION['admin'] = $user;
    header("Location: index.php");
    exit;
  } else {
    echo "<script>alert('Invalid credentials');</script>";
  }
}
?>