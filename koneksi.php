<?php
// Konfigurasi Database MySQL (Laragon default)
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_sim_barang";

// Membuat koneksi menggunakan objek mysqli
$koneksi = new mysqli($host, $user, $password, $dbname);

// Periksa apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
// Jika berhasil, koneksi siap digunakan di file lain!
?>