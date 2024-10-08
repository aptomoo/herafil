<?php
include('koneksi.php');
session_start();
?>
<?php
if (empty($_SESSION["pesanan"]) or !isset($_SESSION["pesanan"])) {
  echo "<script>alert('Pesanan kosong, Silahkan Pesan dahulu');</script>";
  echo "<script>location= 'index.php'</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

  <title>MHS FOOD</title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  bg-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link mr-4" href="index.php">DAFTAR MENU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-4" href="pesanan_pembeli.php">PESANAN ANDA</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->

  <!-- Menu -->
  <div class="container">
    <div class="judul-pesanan mt-5">

      <h3 class="text-center font-weight-bold">PESANAN ANDA</h3>

    </div>
    <table class="table table-bordered" id="example">
      <thead class="thead-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pesanan</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Total Harga</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor = 1; ?>
        <?php $totalbelanja = 0; ?>
        <?php foreach ($_SESSION["pesanan"] as $id_menu => $jumlah): ?>

          <?php
          include('koneksi.php');
          $ambil = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu='$id_menu'");
          $pecah = $ambil->fetch_assoc();
          $subharga = $pecah["harga"] * $jumlah;
          ?>
          <tr>
            <td>
              <?php echo $nomor; ?>
            </td>
            <td>
              <?php echo $pecah["nama_menu"]; ?>
            </td>
            <td>Rp.
              <?php echo number_format($pecah["harga"]); ?>
            </td>
            <td>
              <?php echo $jumlah; ?>
            </td>
            <td>Rp.
              <?php echo number_format($subharga); ?>
            </td>
            <td>
              <a onclick="return confirm('Apakah anda ingin Hapus ?');"
                href="hapus_pesanan.php?id_menu=<?php echo $id_menu ?>" class="badge badge-danger">Hapus</a>
            </td>
          </tr>
          <?php $nomor++; ?>
          <?php $totalbelanja += $subharga; ?>
        <?php endforeach ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4">Total Belanja</th>
          <th colspan="2">Rp.
            <?php echo number_format($totalbelanja) ?>
          </th>
        </tr>
      </tfoot>
    </table><br>
    <form method="POST" action="">
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
      
      <div class="form-group">
        <label for="ponsel">No. Handphone:</label>
        <input type="text" class="form-control" id="ponsel" name="ponsel" placeholder="Masukkan nomor" required>
      </div>
      <a href="index.php" class="btn btn-primary btn-sm">Lihat Menu</a>
      <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
    </form>

    <?php
    if (isset($_POST['konfirm'])) {
      $ponsel = $_POST['ponsel'];
      $nama = $_POST['nama'];
      $tanggal_pemesanan = date("Y-m-d");

      // Menyimpan data ke tabel order
      $insert = mysqli_query($koneksi, "INSERT INTO order (tanggal, total) VALUES ('$tanggal_pemesanan', '$totalbelanja')");

      // Mendapatkan ID barusan
      $id_terbaru = $koneksi->insert_id;

      // Menyimpan data ke tabel order_menu
      foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) {
        $insert = mysqli_query($koneksi, "INSERT INTO order_menu (id_pemesanan, id_menu, jumlah, nama, ponsel) 
              VALUES ('$id_terbaru', '$id_menu', '$jumlah', '$nama', '$ponsel') ");
      }

      // Mengosongkan pesanan
      unset($_SESSION["pesanan"]);

      // Dialihkan ke halaman nota
      echo "<script>alert('Pemesanan Sukses!');</script>";
      echo "<script>location= 'index.php'</script>";
    }
    ?>
  </div>

  <!-- Akhir Menu -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
  </script>
</body>

</html>
<?php ?>