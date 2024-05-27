<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../login/login.php");
  exit;
}

require '../config/config.php';

$product = query("SELECT * FROM product");

if (isset($_POST["search"])) { 
  $product = search($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light fixed-top">
      <div class="container d-flex justify-content-between">
        <h1 class="brand">TechnoHub</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav justify-content-center" style="width: 100%">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" target="_blank" href="../product/product.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
          <div class="border-0 me-2">
            <a href="../product/keranjang.php" target="_blank" class="btn btn-warning">Keranjang</a>
          </div>
          <div class="border-0">
            <a href="../logout/logout.php" class="btn btn-danger">Logout</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">...</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->

    <section class="hero-element d-flex align-items-center justify-content-evenly py-5" style="margin-top: 70px">
      <div class="d-flex">
        <img src="./img/rafiki.png" alt="Hero-Image" />
      </div>
      <div class="hero-elements d-flex flex-column">
        <h1 class="text-light">
          Berbelanja Lebih Cepat Akses <br />
          Mudah, Belanja Aman.
        </h1>
        <p class="text-light">
          Teknologi revolusioner untuk mempermudah hidup Anda, <br />
          menghadirkan solusi digital terbaik dalam genggaman.
        </p>
        <div class="border-0">
          <button href="#" class="btn btn-primary btn-lg rounded-4">Get Product</button>
        </div>
      </div>
    </section>

    <section class="d-flex flex-column align-items-center justify-content-evenly section-animation" id="animatedSection">
      <h2 class="mt-5 text-center">Selamat datang di Wisata Digital Product</h2>
      <p class="text-center">Tempatnya untuk menemukan dan merasakan keajaiban produk digital terbaik!</p>
      <div class="container text-align-center mt-2">
        <div class="d-flex flex-column gap-4">
          <div class="d-flex flex-row justify-content-center flex-wrap gap-4">
            <div class="text-center rounded-4 text-light px-5 py-2" style="background-color: #123159">Office</div>
            <div class="text-center rounded-4 text-light px-5 py-2" style="background-color: #123159">Game</div>
            <div class="text-center rounded-4 text-light px-5 py-2" style="background-color: #123159">Canva</div>
            <div class="text-center rounded-4 text-light px-5 py-2" style="background-color: #123159">Word</div>
          </div>
          <div class="d-flex flex-row justify-content-center flex-wrap gap-4">
            <div class="text-center rounded-4 text-light px-5 py-2" style="background-color: #123159">Powerpoint</div>
            <div class="text-center rounded-4 text-light px-5 py-2" style="background-color: #123159">Netflix</div>
            <div class="text-center rounded-4 text-light px-5 py-2" style="background-color: #123159">Software</div>
            <div class="text-center rounded-4 text-light px-5 py-2" style="background-color: #123159">Data</div>
          </div>
        </div>
      </div>
    </section>

    <hr class="mt-5" width="300px" />
    <br />
    <hr class="mt-2" width="300px" />

    <section class="mt-5 d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <img src="./img/aboutimg.png" alt="About Image" width="470px" height="413px" class="img-fluid about-img" />
          </div>
          <div class="col-lg-6">
            <h2 class="title-about">About Us</h2>
            <p class="deskripsi-about">
              Selamat datang di TechnoHub! Kami adalah komunitas digital yang menyediakan pengalaman berbelanja produk digital terbaik untuk para pecinta teknologi. Dengan kurasi produk yang ketat dan jaringan mitra luas, kami hadir dengan
              pilihan produk terkini dan berkualitas tinggi, memastikan kenyamanan dan keamanan dalam bertransaksi Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam perspiciatis dolorum excepturi enim labore facilis illum
              nam ipsa, maxime voluptates totam modi ex, repudiandae sit magni aut laborum odio rerum.
            </p>
            <div class="border-0">
              <a href="#" id="buttonAbout" class="buttonAbout btn btn-primary rounded-4 px-3 py-2">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <hr class="mt-5 ms-auto" width="300px" />
    <br />
    <hr class="mt-2 ms-auto" width="300px" />

    <section class="container">
      <h2 class="mt-5" style="color: #123159">Rekomendasi Product</h2>
      <div class="container mb-4 d-flex flex-row gap-3 justify-content-evenly flex-wrap">
        <?php foreach ($product as $row) : ?>
        <div class="card mt-2" style="width: 230px; height: 350px">
          <img src="img/<?= $row["photo_product"]; ?>" class="card-img-top" alt="Product" width="174px" height="189px" />
          <div class="card-body">
            <h5 class="card-title fw-bold"><?= $row["name_product"]; ?></h5>
            <p class="card-text">Rp<?= $row["price_product"]; ?></p>
            <a href="../product/detailproduk.php?id=<?= $row["id"]; ?>" class="btn btn-primary" style="position: absolute; bottom: 10px; right: 10px">Detail</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="mt-5 container d-flex justify-content-end">
        <a href="../product/product.php" target="_blank" class="btn px-3 rounded-3" style="background-color: #123159; color: white; font-weight: bold">View All</a>
      </div>
    </section>

    <section style="background-color: #123159" class="mt-5 d-flex flex-column gap-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <div class="mt-4 d-flex flex-column gap-1">
              <h2 class="text-warning">Social Media</h2>
              <div class="d-flex flex-row gap-2 align-items-center justify-content-start">
                <a class="fs-5 text-light text-decoration-none"><img src="./img/facebook.png" alt="Facebook" width="40px" height="39px" style="margin-right: 10px" />Facebook</a>
              </div>
              <div class="d-flex flex-row gap-2 align-items-center justify-content-start">
                <a class="fs-5 text-light text-decoration-none"><img src="./img/instagram.png" alt="Instagram" width="40px" height="39px" style="margin-right: 10px" />Instagram</a>
              </div>
              <div class="d-flex flex-row gap-2 align-items-center justify-content-start">
                <a class="fs-5 text-light text-decoration-none"><img src="./img/twiter.png" alt="Twitter" width="40px" height="39px" style="margin-right: 10px" />Twitter</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mx-auto">
            <div class="mt-4 d-flex flex-column gap-1 align-items-center">
              <h2 class="text-warning">Need Help</h2>
              <div class="d-flex flex-column gap-3 text-light">
                <h5 class="">088980034027 (8 am -12 am, monday - saturday)</h5>
                <h5>082325980633(1 pm - 6 pm, monday - saturday)</h5>
                <h5>technohub2334@gmail.com</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center mt-3">
        <small class="text-light">Copyright &copy; 2023 PERLCANDUNIAWI. All Rights Reserved.</small>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>
