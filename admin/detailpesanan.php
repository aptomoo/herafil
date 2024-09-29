<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['login_user'])) {
  header("location: login.php");
} else {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../asset/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  </head>

  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="index.php">Mhs Food</a>
      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      <!-- Navbar Search-->
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">Menu dan Pesanan</div>
              <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Daftar Menu

              </a>
              <a class="nav-link" href="pesanan1.php">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Pesanan Pelanggan

              </a>
              <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              </div>
              <div class="sb-sidenav-menu-heading">Logout</div>
              <a class="nav-link" href="logout.php">
                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                logout
              </a>
            </div>
          </div>
        </nav>
      </div>
      <div id="layoutSidenav_content">

        <!-- Menu -->
        <div class="container">
          <div class="judul-pesanan mt-5">
            <h3 class="text-center font-weight-bold">DATA PESANAN PELANGGAN</h3>
            <br>
          </div>
          <table class="table table-bordered" id="example">
            <thead class="thead-light">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">No. Handphone</th>
                <th scope="col">Nama Pesanan</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Subharga</th>
              </tr>
            </thead>
            <tbody>
              <?php $nomor = 1; ?>
              <?php $totalbelanja = 0; ?>
              <?php
              $ambil = $koneksi->query("SELECT * FROM order_menu JOIN menu ON order_menu.id_menu=menu.id_menu 
                WHERE order_menu.id_pemesanan='$_GET[id]'");
              ?>
              <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                <?php $subharga1 = $pecah['harga'] * $pecah['jumlah']; ?>
                <tr>
                  <th scope="row"><?php echo $nomor; ?></th>
                  <td><?php echo $pecah['nama']; ?></td>
                  <td><?php echo $pecah['ponsel']; ?></td>
                  <td><?php echo $pecah['nama_menu']; ?></td>
                  <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                  <td><?php echo $pecah['jumlah']; ?></td>
                  <td>Rp. <?php echo number_format($subharga1); ?></td>
                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja += $subharga1; ?>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="7">Total Bayar</th>
                <th>Rp. <?php echo number_format($totalbelanja) ?></th>
              </tr>
            </tfoot>
          </table><br>
          <form method="POST" action="">
            <a href="pesanan1.php" class="btn btn-success btn-sm">Kembali</a>
          </form>

        </div>
        <!-- Akhir Menu -->
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
              <div class="text-muted">Copyright &copy; Mhs Food 2023</div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../asset/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../asset/js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>
  </body>

  </html>
<?php } ?>