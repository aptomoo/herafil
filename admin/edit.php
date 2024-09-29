<?php
include('koneksi.php');

$jenis = $_POST['jenis_menu'];
$id_menu = $_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

// Memeriksa apakah gambar baru diunggah
if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
	// Jika ada gambar yang diunggah, lakukan pembaruan dengan mengunggah gambar baru
	$nama_file = $_FILES['gambar']['name'];
	$source = $_FILES['gambar']['tmp_name'];
	$folder = '../image/';
	move_uploaded_file($source, $folder . $nama_file);

	// Memperbarui data gambar di database
	$edit = mysqli_query($koneksi, "UPDATE menu SET jenis_menu='$jenis', nama_menu='$nama_menu', deskripsi='$deskripsi', harga='$harga', gambar='$nama_file' WHERE id_menu='$id_menu' ");
} else {
	// Jika tidak ada gambar yang diunggah, lakukan pembaruan tanpa memperbarui data gambar di database
	$edit = mysqli_query($koneksi, "UPDATE menu SET jenis_menu='$jenis', nama_menu='$nama_menu', deskripsi='$deskripsi', harga='$harga' WHERE id_menu='$id_menu' ");
}

if ($edit)
	header('location: index.php');
else
	echo "Edit Menu Gagal";
