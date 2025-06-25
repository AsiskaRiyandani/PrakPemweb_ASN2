<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Produk</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-image: url('foto 1.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #333;
            padding: 20px;
        }

        h2 {
            color: #ff6f61;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 400px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        button {
            background-color: #ffb6b9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #ff6f61;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #6c63ff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #ff6f61;
        }
    </style>
</head>
<body>

<?php include 'koneksi.php'; ?>

<?php
$kode = $_GET['kode'];
$data = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk='$kode'");

// Jika data ditemukan
if (mysqli_num_rows($data) > 0) {
    $row = mysqli_fetch_assoc($data);
} else {
    echo "<p style='color:red;'>Data tidak ditemukan.</p>";
    exit;
}
?>

<h2>Edit Data Produk</h2>

<form method="POST" action="">
    Nama Produk: <input type="text" name="nama" value="<?= $row['nama_produk']; ?>"><br>
    Kategori: <input type="text" name="kategori" value="<?= $row['kategori']; ?>"><br>
    Harga: <input type="number" name="harga" value="<?= $row['harga']; ?>"><br>
    Tanggal Kadaluarsa: <input type="date" name="kadaluarsa" value="<?= $row['tanggal_kadaluarsa']; ?>"><br>
    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $kadaluarsa = $_POST['kadaluarsa'];

    $query = "UPDATE produk SET 
                nama_produk='$nama', 
                kategori='$kategori', 
                harga='$harga', 
                tanggal_kadaluarsa='$kadaluarsa' 
              WHERE kode_produk='$kode'";

    if (mysqli_query($conn, $query)) {
        echo "<p style='color:green;'>Data berhasil diupdate! <a href='index.php'>Kembali</a></p>";
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

</body>
</html>
