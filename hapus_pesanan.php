<?php 
session_start();
 
$id_menu = $_GET["id_menu"];

unset($_SESSION["pesanan"][$id_menu]);

echo "<script>alert('Menu telah dihapus');</script>"; 
echo "<script>location= 'pesanan_pembeli.php'</script>";


?>