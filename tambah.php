<?php
// Panggil koneksi database
include 'koneksi.php';

// Proses jika tombol 'simpan' ditekan
if (isset($_POST['simpan'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori    = $_POST['kategori'];
    $jumlah      = $_POST['jumlah'];
    $kondisi     = $_POST['kondisi'];

    // Query untuk memasukkan data baru ke database
    $sql = "INSERT INTO barang (kode_barang, nama_barang, kategori, jumlah, kondisi) 
            VALUES ('$kode_barang', '$nama_barang', '$kategori', '$jumlah', '$kondisi')";
    
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        // Jika berhasil, kembali ke halaman tampil
        header("location: tampil.php?pesan=tambah-berhasil");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang - SIM Barang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 5px rgba(0,0,0,0.1); max-width: 500px; margin: auto; }
        h2 { margin-bottom: 20px; color: #333; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn-simpan { padding: 10px 15px; background: #28a745; border: none; color: white; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn-simpan:hover { background: #218838; }
        .btn-kembali { background: #6c757d; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; margin-left: 10px; font-size: 14px; }
        .btn-kembali:hover { background: #5a6268; }
    </style>
</head>
<body>

<div class="card">
    <h2>Tambah Data Barang Baru</h2>
    
    <form action="" method="POST">
        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" required autocomplete="off">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" required>
        </div>
        <div class="form-group">
            <label>Kondisi</label>
            <input type="text" name="kondisi" placeholder="Contoh: Baik / Rusak Ringan" required>
        </div>

        <button type="submit" name="simpan" class="btn-simpan">Simpan Data</button>
        <a href="tampil.php" class="btn-kembali">Kembali</a>
    </form>
</div>

</body>
</html>