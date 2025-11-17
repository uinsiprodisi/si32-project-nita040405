<?php
session_start();
include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
  <h2>Login Admin</h2>

  <?php
  if (isset($_POST['login'])) {
      $input = $_POST['username']; 
      $password = $_POST['password'];

      // Cek apakah input berupa email atau username
      if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
          $query = "SELECT * FROM users WHERE email='$input'";
      } else {
          $query = "SELECT * FROM users WHERE username='$input'";
      }

      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);

          if (password_verify($password, $row['password'])) {
              // Simpan informasi user ke session
              $_SESSION['user_id'] = $row['id'];
              $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
              $_SESSION['username'] = $row['username'];

              // Arahkan ke dashboard admin
              header("Location: dashboard.php");
              exit();
          } else {
              echo "<p style='color:red;'>Password salah!</p>";
          }
      } else {
          echo "<p style='color:red;'>Username atau email tidak ditemukan!</p>";
      }
  }
  ?>

  <form method="POST" action="">
      <label>Username atau Email:</label><br>
      <input type="text" name="username" placeholder="Masukkan username atau email" required><br><br>

      <label>Password:</label><br>
      <input type="password" name="password" placeholder="Masukkan password" required><br><br>

      <button type="submit" name="login">Login</button>
  </form>

</body>
</html>
