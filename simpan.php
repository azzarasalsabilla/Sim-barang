<?php
// Memeriksa apakah data dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap data dari formulir menggunakan $_POST
    $kode = htmlspecialchars($_POST['kode']);
    $nama = htmlspecialchars($_POST['nama']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $jumlah = intval($_POST['jumlah']);
    $kondisi = htmlspecialchars($_POST['kondisi']);
    // Panggil koneksi database
include 'koneksi.php';

// Menghitung total harga
$total_harga = $harga_satuan * $jumlah;

// Query untuk menyimpan data ke tabel barang (pastikan nama tabel & kolom sesuai)
$sql = "INSERT INTO barang (kode_barang, nama_barang, kategori, jumlah, kondisi, harga_satuan, total_harga) 
        VALUES ('$kode', '$nama', '$kategori', '$jumlah', '$kondisi', '$harga_satuan', '$total_harga')";

if ($koneksi->query($sql) === TRUE) {
    echo "<script>alert('Data barang berhasil disimpan!'); window.location='index.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();

    // Simulasi harga satuan berdasarkan kategori untuk perhitungan nilai aset
    $harga_satuan = 0;
    switch ($kategori) {
        case 'Elektronik':
            $harga_satuan = 7500000;
            break;
        case 'Multimedia':
            $harga_satuan = 4000000;
            break;
        case 'Furnitur':
            $harga_satuan = 500000;
            break;
        default:
            $harga_satuan = 100000;
            break;
    }

    // Perhitungan statistik: Total Estimasi Nilai Aset = Jumlah Barang × Harga Satuan
    $total_nilai = $jumlah * $harga_satuan;
} else {
    // Jika diakses langsung tanpa submit form, alihkan kembali ke index
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemrosesan - SIM-Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hasil Pemrosesan Data Barang</h1>
        <p>Modul PHP Native Dasar - SIM-Barang</p>
    </header>

    <main>
        <section>
            <h2>Ringkasan Data yang Berhasil Diproses</h2>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>Kode Barang</th>
                    <td><?php echo $kode; ?></td>
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <td><?php echo $nama; ?></td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td><?php echo $kategori; ?></td>
                </tr>
                <tr>
                    <th>Jumlah Barang</th>
                    <td><?php echo $jumlah; ?></td>
                </tr>
                <tr>
                    <th>Kondisi</th>
                    <td><?php echo $kondisi; ?></td>
                </tr>
                <tr>
                    <th>Estimasi Harga Satuan</th>
                    <td>Rp <?php echo number_format($harga_satuan, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th>Total Estimasi Nilai Aset</th>
                    <td><strong>Rp <?php echo number_format($total_nilai, 0, ',', '.'); ?></strong></td>
                </tr>
            </table>

            <br>
            <a href="index.html" style="display: inline-block; background-color: #2c3e50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">Kembali ke Beranda</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 SIM-Barang - D3 Manajemen Informatika Polsri[cite: 1, 2].</p>
    </footer>
</body>
</html>