<?php include 'koneksi.php'; ?>

<?php
$kode = $_GET['kode'];
$query = "DELETE FROM produk WHERE kode_produk='$kode'";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>