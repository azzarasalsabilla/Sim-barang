<?php
// Panggil koneksi database
include 'koneksi.php';

// Cek apakah ada parameter 'id' yang dikirim
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan id
    $sql = "DELETE FROM barang WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    // Cek apakah data berhasil dihapus
    if ($query) {
        // Alihkan ke halaman tampil data dengan pesan sukses
        header("location: tampil.php?pesan=hapus-berhasil");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    // Jika tidak ada ID, kembalikan ke halaman tampil
    header("location: tampil.php");
    exit;
}
?>