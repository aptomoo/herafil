<?php
include('koneksi.php');

$id_menu = $_GET['id_menu'];

$ambil = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu='$id_menu'");
$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../css1/bootstrap.min.css">


  <title>Form Edit Menu</title>
</head>

<body>

  <div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN EDIT MENU</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="edit.php" enctype="multipart/form-data">

        <div class="form-group">
          <label for="jenis_menu">Jenis Menu</label>
          <select class="form-control" id="jenis_menu" name="jenis_menu">
            <option value="Coffee" <?php if ($result[0]['jenis_menu'] == 'Coffee') echo 'selected'; ?>>Coffee</option>
            <option value="Non Coffee" <?php if ($result[0]['jenis_menu'] == 'Non Coffee') echo 'selected'; ?>>Non Coffee</option>
            <option value="Makanan" <?php if ($result[0]['jenis_menu'] == 'Makanan') echo 'selected'; ?>>Makanan</option>
          </select>
        </div>

        <div class="form-group">
          <label for="menu1">Nama Menu</label>
          <input type="hidden" name="id_menu" value="<?php echo $result[0]['id_menu'] ?>">
          <input type="text" class="form-control" id="menu1" name="nama_menu" value="<?php echo $result[0]['nama_menu'] ?>">
        </div>

        <div class="form-group">
          <label for="harga1">Harga Menu</label>
          <input type="text" class="form-control" id="harga1" name="harga" value="<?php echo $result[0]['harga'] ?>">
        </div>

        <div class="form-group">
          <label for="deskripsi">Deskripsi Menu</label>
          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?php echo $result[0]['deskripsi'] ?></textarea>
        </div>

        <div class="form-group">
          <label for="gambar">Foto Menu</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar" onchange="showFileName(this)">
          <small id="file-info">Current Image: <?php echo $result[0]['gambar'] ?></small>
        </div><br>

        <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <script>
    // Fungsi untuk menampilkan nama file yang dipilih pada field file input
    function showFileName(input) {
      var fileName = input.files[0].name;
      var fileInfo = document.getElementById('file-info');
      fileInfo.textContent = 'Current Image: ' + fileName;
    }
  </script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
</body>

</html>