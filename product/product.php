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
    <title>Halaman Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="product.css">
  </head>
  <body>
    <div class="container-fluid">
      <form class="mt-4 d-flex flex-column justify-content-center" method="post">
        <h2 class="mt-2 mb-3 text-center" style="color: #123159">Product</h2>
        <div class="container d-flex mb-5 gap-4 justify-content-center">
          <input name="keyword" class="rounded-4 px-4" type="text" placeholder="Cari produk..." autocomplete="off" />
          <button class="btn btn-primary rounded-4 px-4" type="submit" name="search">Search</button>
        </div>
      </form>
      <section class="container">
        <div class="container mb-4 d-flex flex-row gap-3 justify-content-evenly flex-wrap">
          <?php foreach ($product as $row) : ?>
          <div class="card mt-2" style="width: 230px; height: 350px">
            <img src="img/<?= $row["photo_product"]; ?>" class="card-img-top" alt="Product" width="174px" height="189px" />
            <div class="card-body">
              <h5 class="card-title fw-bold"><?= $row["name_product"]; ?></h5>
              <p class="card-text">Rp<?= $row["price_product"]; ?></p>
              <a href="detailproduk.php?id=<?= $row["id"]; ?>" class="btn btn-primary" style="position: absolute; bottom: 10px; right: 10px">Detail</a>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
