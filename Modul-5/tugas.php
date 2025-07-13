<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 50px;
        }
        .container {
            background: #ffffff;
            width: 100%;
            max-width: 550px;
            padding: 30px 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #00796b;
        }
        label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
            color: #333;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            margin-top: 5px;
            transition: border-color 0.3s;
            font-size: 14px;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #009688;
            outline: none;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        input[type="submit"] {
            margin-top: 25px;
            background-color: #009688;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #00796b;
        }
        .error {
            color: #e53935;
            font-size: 13px;
            margin-top: 3px;
        }
        .output {
            margin-top: 30px;
            padding: 20px;
            border-left: 6px solid #009688;
            background-color: #f1f8f7;
            border-radius: 8px;
        }
        .output p {
            margin: 10px 0;
            font-size: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Buku Tamu Digital STITEK Bontang</h1>

    <?php
    $nama = $email = $pesan = "";
    $errorNama = $errorEmail = $errorPesan = "";
    $dataValid = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dataValid = true;

        // Validasi Nama
        if (empty($_POST["nama"])) {
            $errorNama = "Nama tidak boleh kosong.";
            $dataValid = false;
        } else {
            $nama = htmlspecialchars(trim($_POST["nama"]));
        }

        // Validasi Email
        if (empty($_POST["email"])) {
            $errorEmail = "Email tidak boleh kosong.";
            $dataValid = false;
        } else {
            $email = htmlspecialchars(trim($_POST["email"]));
        }

        // Validasi Pesan
        if (empty($_POST["pesan"])) {
            $errorPesan = "Pesan tidak boleh kosong.";
            $dataValid = false;
        } else {
            $pesan = htmlspecialchars(trim($_POST["pesan"]));
        }
    }
    ?>

    <!-- Form Buku Tamu -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
        <?php if ($errorNama) echo "<div class='error'>$errorNama</div>"; ?>

        <label for="email">Alamat Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
        <?php if ($errorEmail) echo "<div class='error'>$errorEmail</div>"; ?>

        <label for="pesan">Pesan/Komentar:</label>
        <textarea id="pesan" name="pesan"><?php echo $pesan; ?></textarea>
        <?php if ($errorPesan) echo "<div class='error'>$errorPesan</div>"; ?>

        <input type="submit" value="Kirim Pesan">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $dataValid): ?>
        <div class="output">
            <h3>Data berhasil dikirim:</h3>
            <p><strong>Nama:</strong> <?php echo $nama; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Pesan:</strong> <?php echo nl2br($pesan); ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
