<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu = $productId");
    $result = mysqli_fetch_assoc($query);

    // Keluarkan hasil dalam format JSON
    echo json_encode($result);
} else {
    echo 'Product ID not provided.';
}
?>
