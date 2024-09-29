<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herafil Cafe</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Feather Icons-->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>

    <!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Herafil <span>Cafe</span></a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#produk">Menu</a>
            <a href="#about">About Us</a>
            <a href="pesanan_pembeli.php">Order</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>

    </nav>
    <!-- Navbar end -->

    <!-- Hero Section start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>"Coffee first,  <span>Everything else later."</span></h1>
        </main>
    </section>
    <!-- Hero Section end -->

    

    <!-- Produk Section start -->
    <section class="produk" id="produk">
        <h2>Coffee</h2>
        
        <div class="row">
            <?php
            include('koneksi.php');
            $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE jenis_menu = 'Coffee'");
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            ?>
            <?php foreach ($result as $result): ?>
                <div class="produk-card" data-product-id="<?php echo $result['id_menu']; ?>">
                    <div class="produk-icons">
                        <a href="beli.php?id_menu=<?php echo $result['id_menu']; ?>"><i
                                data-feather="shopping-cart"></i></a>
                    </div>
                    <div class="produk-image">
                        <img src="image/<?php echo $result['gambar'] ?>" alt="<?php echo $result['nama_menu'] ?>">
                    </div>
                    <div class="produk-content">
                        <h3>
                            <?php echo $result['nama_menu'] ?>
                        </h3>
                        <p>
                            <?php echo $result['deskripsi'] ?>
                        </p>
                        <div class="produk-price">Rp.
                            <?php echo number_format($result['harga']); ?> <!--<span>Rp. 50000</span>-->
                        </div>
                        <!-- <?php echo $result['deskripsi']; ?> -->
                        <input type="hidden" class="product-data" value='<?php echo json_encode($result); ?>'>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        
    </section>
    <!-- Produk Section end -->

    <section class="produk" id="produk">
        <h2>Non <span>Coffee </span></h2>
        
       

        <div class="row">
            <?php
            include('koneksi.php');
            $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE jenis_menu = 'Non Coffee'");
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            ?>
            <?php foreach ($result as $result): ?>
                <div class="produk-card" data-product-id="<?php echo $result['id_menu']; ?>">
                    <div class="produk-icons">
                        <a href="beli.php?id_menu=<?php echo $result['id_menu']; ?>"><i
                                data-feather="shopping-cart"></i></a>
                    </div>
                    <div class="produk-image">
                        <img src="image/<?php echo $result['gambar'] ?>" alt="<?php echo $result['nama_menu'] ?>">
                    </div>
                    <div class="produk-content">
                        <h3>
                            <?php echo $result['nama_menu'] ?>
                        </h3>
                        <p>
                            <?php echo $result['deskripsi'] ?>
                        </p>
                        <div class="produk-price">Rp.
                            <?php echo number_format($result['harga']); ?> <!--<span>Rp. 50000</span>-->
                        </div>
                        <!-- <?php echo $result['deskripsi']; ?> -->
                        <input type="hidden" class="product-data" value='<?php echo json_encode($result); ?>'>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- Produk Section end -->

    <!-- Produk Section start -->
    <section class="produk" id="produk">
        <h2>Our <span>Food </span></h2>

        <div class="row">
            <?php
            include('koneksi.php');
            $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE jenis_menu = 'Makanan'");
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            ?>
            <?php foreach ($result as $result): ?>
                <div class="produk-card" data-product-id="<?php echo $result['id_menu']; ?>">
                    <div class="produk-icons">
                        <a href="beli.php?id_menu=<?php echo $result['id_menu']; ?>"><i
                                data-feather="shopping-cart"></i></a>
                    </div>
                    <div class="produk-image">
                        <img src="image/<?php echo $result['gambar'] ?>" alt="<?php echo $result['nama_menu'] ?>">
                    </div>
                    <div class="produk-content">
                        <h3>
                            <?php echo $result['nama_menu'] ?>
                        </h3>
                        <p>
                            <?php echo $result['deskripsi'] ?>
                        </p>
                        <div class="produk-price">Rp.
                            <?php echo number_format($result['harga']); ?> <!--<span>Rp. 50000</span>-->
                        </div>
                        <!-- <?php echo $result['deskripsi']; ?> -->
                        <input type="hidden" class="product-data" value='<?php echo json_encode($result); ?>'>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- Produk Section end -->



    <!-- About Section start -->
    <section id="about" class="about">
        <h2><span>About</span> Us</h2>

        <div class="row">
            <div class="about-img">
                <img src="image/herafil.png" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Herafil Cafe</h3>
                <p>A place that offers a relaxed and comfortable atmosphere, where visitors can enjoy a variety of drinks and food. The cafe's interior is designed to be as attractive as possible and provides free Wi-Fi for guests to work or study while enjoying a cup of coffee.
                </p>
            </div>
        </div>
    </section>
    <!-- About Section end -->


    <!-- Footer start -->
    <footer>
        <div class="socials">
            <a href="https://www.instagram.com/mutiarazhfr_?igsh=MTdrYnJjZDJ2NWhi"><i data-feather="instagram"></i></a>
            <a href="https://wa.me/qr/3DSAAY475I6UN1"><i class="fa fa-whatsapp" style="font-size:28px"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#produk">Menu</a>
            <a href="#about">About Us</a>
        </div>

        <div class="credit">
            <p>Created by <a href="">Mutiara Zhafira Yudo Eka Putri</a> | &copy; 2024.</p>

        </div>
    </footer>
    <!-- Footer end -->

    <!-- Modal Box Item Detail start -->
    <div class="modal" id="item-detail-modal">
        <div class="modal-container">
            <a href="#" class="close-icon"><i data-feather="x"></i></a>
            <div class="modal-content">
                <img src="" alt="produk" id="modal-product-image">
                <div class="produk-content">
                    <h3 id="modal-product-name"></h3>
                    <p id="modal-product-description"></p>
                    <div class="promo-stars">
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                    </div>
                    <div class="promo-price">Rp. <p id="modal-product-price"></p></div>
                    <a href="beli.php?id_menu=<?php echo $result['id_menu']; ?>"><i data-feather="shopping-cart"></i>
                        <span>add to cart</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Box Item Detail end -->

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>

</body>

</html>