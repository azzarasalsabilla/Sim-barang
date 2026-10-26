<?php
// Panggil koneksi database
include 'koneksi.php';

// Cek apakah ada parameter 'id' yang dikirim dari halaman tampil
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data barang berdasarkan id
    $sql = "SELECT * FROM barang WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);

    // Jika data tidak ditemukan
    if (!-data) {
        echo "Data tidak ditemukan!";
        exit;
    }
}

// Proses jika tombol 'update' ditekan
if (isset($_POST['update'])) {
    $id          = $_POST['id'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori    = $_POST['kategori'];
    $jumlah      = $_POST['jumlah'];
    $kondisi     = $_POST['kondisi'];

    // Query update data ke database
    $update = "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', kategori='$kategori', jumlah='$jumlah', kondisi='$kondisi' WHERE id='$id'";
    $query_update = mysqli_query($koneksi, $update);

    if ($query_update) {
        header("location: tampil.php?pesan=update-berhasil");
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang - SIM Barang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 5px rgba(0,0,0,0.1); max-width: 500px; margin: auto; }
        h2 { margin-bottom: 20px; color: #333; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn-simpan { padding: 10px 15px; background: #007bff; border: none; color: white; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn-simpan:hover { background: #0056b3; }
        .btn-kembali { background: #6c757d; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; margin-left: 10px; font-size: 14px; }
        .btn-kembali:hover { background: #5a6268; }
    </style>
</head>
<body>

<div class="card">
    <h2>Edit Data Barang</h2>
    
    <form action="" method="POST">
        <!-- Simpan ID secara tersembunyi (hidden) untuk acuan database -->
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" value="<?php echo $data['kode_barang']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" value="<?php echo $data['kategori']; ?>" required>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="<?php echo $data['jumlah']; ?>" required>
        </div>
        <div class="form-group">
            <label>Kondisi</label>
            <input type="text" name="kondisi" value="<?php echo $data['kondisi']; ?>" required>
        </div>

        <button type="submit" name="update" class="btn-simpan">Simpan Perubahan</button>
        <a href="tampil.php" class="btn-kembali">Kembali</a>
    </form>
</div>

</body>
</html>