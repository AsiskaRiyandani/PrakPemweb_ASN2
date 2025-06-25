<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk Makanan</title>
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

        a {
            color: #6c63ff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #ff6f61;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #ffe4e1;
            color: #333;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #f0f0f0;
        }

        tr:hover {
            background-color: #fff0f5;
            transition: 0.3s;
        }

        button, input[type="submit"] {
            background-color: #ffb6b9;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #ff6f61;
        }
    </style>
</head>
<body>

<?php include 'koneksi.php'; ?>

<h2>Data Produk Makanan</h2>
<a href="tambah.php">Tambah Data</a><br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Kode</th>
        <th>Nama Produk</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Kadaluarsa</th>
        <th>Aksi</th>
    </tr>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM produk");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>".$row['kode_produk']."</td>
            <td>".$row['nama_produk']."</td>
            <td>".$row['kategori']."</td>
            <td>".$row['harga']."</td>
            <td>".$row['tanggal_kadaluarsa']."</td>
            <td>
                <a href='edit.php?kode=".$row['kode_produk']."'>Edit</a> |
                <a href='hapus.php?kode=".$row['kode_produk']."' onclick=\"return confirm('Yakin hapus?');\">Hapus</a>
            </td>
        </tr>";
    }
    ?>
</table>

</body>
</html>
