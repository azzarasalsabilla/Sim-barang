<?php
// Panggil koneksi database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang - SIM Barang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        h2 { color: #333; }
        .btn-tambah { display: inline-block; padding: 8px 12px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; margin-bottom: 15px; }
        .btn-tambah:hover { background: #218838; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0px 0px 5px rgba(0,0,0,0.1); }
        th, td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #007bff; color: white; }
        tr:hover { background-color: #f1f1f1; }
        .btn-edit { padding: 5px 10px; background: #ffc107; color: black; text-decoration: none; border-radius: 3px; font-size: 12px; }
        .btn-hapus { padding: 5px 10px; background: #dc3545; color: white; text-decoration: none; border-radius: 3px; font-size: 12px; }
        .btn-edit:hover { background: #e0a800; }
        .btn-hapus:hover { background: #c82333; }
    </style>
</head>
<body>

    <h2>Data Inventaris Barang</h2>
    
    <a href="tambah.php" class="btn-tambah">+ Tambah Barang Baru</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            // Ambil data dari tabel database (sesuaikan nama tabelnya)
            $sql = "SELECT * FROM barang";
            $query = mysqli_query($koneksi, $sql);

            while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['kode_barang']; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td><?php echo $data['kategori']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo $data['kondisi']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn-edit">Edit</a>
                    <a href="hapus.php?id=<?php echo $data['id']; ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>