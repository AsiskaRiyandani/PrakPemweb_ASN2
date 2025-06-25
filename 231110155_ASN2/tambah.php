<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Produk</title>
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

<h2>Tambah Data Produk</h2>

<form method="POST" action="">
    Kode Produk: <input type="text" name="kode_produk" required><br>
    Nama Produk: <input type="text" name="nama_produk" required><br>
    Kategori: <input type="text" name="kategori" required><br>
    Harga: <input type="number" name="harga" required><br>
    Tanggal Kadaluarsa: <input type="date" name="tanggal_kadaluarsa" required><br>
    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $kode = $_POST['kode_produk'];
    $nama = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $kadaluarsa = $_POST['tanggal_kadaluarsa'];

    $query = "INSERT INTO produk (kode_produk, nama_produk, kategori, harga, tanggal_kadaluarsa)
              VALUES ('$kode', '$nama', '$kategori', '$harga', '$kadaluarsa')";
    if (mysqli_query($conn, $query)) {
        echo "<p style='color:green;'>Data berhasil ditambahkan! <a href='index.php'>Kembali ke daftar</a></p>";
    } else {
        echo "<p style='color:red;'>Error: " . $query . "<br>" . mysqli_error($conn) . "</p>";
    }
}
?>

</body>
</html>
