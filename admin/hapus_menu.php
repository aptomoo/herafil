<?php 

include('koneksi.php');

$id_menu = $_GET['id_menu'];

$hapus= mysqli_query($koneksi, "DELETE FROM menu WHERE id_menu='$id_menu'");

if($hapus)
	header('location: index.php');
else
	echo "Hapus data gagal";

 ?>