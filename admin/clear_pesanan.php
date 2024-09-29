<?php 

include('koneksi.php');

$id = $_GET['id'];

$hapus= mysqli_query($koneksi, "DELETE FROM order WHERE id_pemesanan='$id'");

if($hapus)
	header('location: pesanan1.php');
else
	echo "Hapus data gagal";

 ?>