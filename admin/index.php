<?php
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
            <a class="navbar-brand ps-3" href="index.php">Herafil Cafe</a>
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
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

                <?php

                include('koneksi.php');

                $query = mysqli_query($koneksi, 'SELECT * FROM menu');
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);


                ?>

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Menu</h1>

                        <div class="card mb-4">
                            <div class="card-header">

                                <a href="tambah_menu.php" class="btn btn-success mt-3">TAMBAH DAFTAR MENU</a>
                                <br>
                                <br>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Jenis Menu</th>
                                            <th>Nama menu</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($result as $result) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $result['jenis_menu'] ?>
                                            </td>
                                            <td>
                                                <?php echo $result['nama_menu'] ?>
                                            </td>
                                            <td>
                                                <?php echo $result['harga'] ?>
                                            </td>
                                            <td><img src="../image/<?php echo $result['gambar'] ?>" alt="" style="width: 100px; height: 100px;"></td>
                                            <td>
                                                <?php echo $result['deskripsi'] ?>
                                            </td>
                                            <td>
                                                <a href="edit_menu.php?id_menu=<?php echo $result['id_menu'] ?>" class="btn btn-success btn-sm btn-block">EDIT</a>
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus menu?');" href="hapus_menu.php?id_menu=<?php echo $result['id_menu'] ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Herafil Cafe 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../asset/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../asset/js/datatables-simple-demo.js"></script>
    </body>

    </html>
<?php } ?>