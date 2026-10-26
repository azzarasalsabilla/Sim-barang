<?php
session_start();
include 'koneksi.php'; // Sesuaikan dengan nama file koneksi database kamu

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Contoh query sederhana pengecekan user (sesuaikan nama tabel & kolom di database-mu)
    $sql = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['username'] = $username;
        header("location: index.php"); // Alihkan ke halaman utama jika berhasil
        exit;
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - SIM Barang</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); width: 300px; }
        .login-card h2 { text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn-login { width: 100%; padding: 10px; background: #007bff; border: none; color: white; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn-login:hover { background: #0056b3; }
        .error { color: red; font-size: 12px; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Login SIM Barang</h2>
    
    <?php if (isset($error)) : ?>
        <p class="error">Username atau Password salah!</p>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" name="login" class="btn-login">Masuk</button>
    </form>
</div>

</body>
</html>