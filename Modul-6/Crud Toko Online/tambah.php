<?php include 'koneksi_toko.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Produk</title></head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form method="post">
        Nama Produk: <input type="text" name="nama_produk" required><br><br>
        Harga: <input type="number" name="harga" required><br><br>
        Stok: <input type="number" name="stok" required><br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $sql = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>
