<?php include 'koneksi_toko.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produk WHERE id_produk=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head><title>Edit Produk</title></head>
<body>
    <h2>Edit Produk</h2>
    <form method="post">
        <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
        Nama Produk: <input type="text" name="nama_produk" value="<?php echo $row['nama_produk']; ?>" required><br><br>
        Harga: <input type="number" name="harga" value="<?php echo $row['harga']; ?>" required><br><br>
        Stok: <input type="number" name="stok" value="<?php echo $row['stok']; ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
    if (isset($_POST['update'])) {
        $id = $_POST['id_produk'];
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $sql = "UPDATE produk SET nama_produk='$nama', harga=$harga, stok=$stok WHERE id_produk=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>
