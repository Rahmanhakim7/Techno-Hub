<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../login/login.php");
  exit;
}

require '../config/config.php';

$id = $_GET["id"];

$detailproduct = productdetail($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $quantity = intval($_POST["quantity"]);

  if (isset($_POST["add_to_cart"])) {
    addtocart($id, $quantity);
  } elseif (isset($_POST["buy_now"])) {
    buynow($id, $quantity);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  </head>
  <body>
    <div class="container-fluid d-flex flex-column">
      <div>
        <h2 class="text-center py-2 mt-3 text-light rounded-4" style="background-color: #123159">Halaman Detail Produk</h2>
      </div>
      <div class="container d-flex flex-row gap-5">
        <div class="col-6 d-flex flex-column gap-2 mt-5">
          <h2><?= $detailproduct["name_product"]; ?></h2>
          <div class="mt-4">
            <img src="img/<?= $detailproduct["photo_product"]; ?>" alt="Gambar Produk" />
          </div>
          <hr class="mt-5" style="width: 100%" />
          <div class="d-flex flex-column gap-2">
            <h4>Deskripsi Produk</h4>
            <p style="text-align: justify;"><?= $detailproduct["description_product"]; ?></p>
          </div>
        </div>

        <div class="col-6 d-flex flex-column gap-2" style="margin-top: 100px;">
          <h4>Rp<?= $detailproduct["price_product"]; ?></h4> 
          <p>Stok: <?= $detailproduct["stock_product"]; ?></p>
          <form method="post">
            <p>Jumlah</p>
            <div class="d-flex flex-row gap-1 align-item-center">
                <button type="button" class="btn btn-secondary" onclick="updatequantity(-1)">-</button>
                <input type="number" id="quantity" name="quantity" class="text-center px-2" style="width: 100px;" value="1" readonly>
                <button type="button" class="btn btn-secondary" onclick="updatequantity(+1)">+</button>
            </div>
            <div class="container mt-5 d-flex flex-row gap-4">
                <button type="submit" name="add_to_cart" class="btn btn-primary rounded-4">Masukkan Keranjang</button>
                <button type="submit" name="buy_now" class="btn rounded-4" style="background-color: darkcyan; color: white;">Beli Sekarang</button>
            </div>
          </form>
          <div class="d-flex flex-column gap-3">
            <div class="container d-flex flex-row">
              <div class="mt-5 w-100">
                  <img src="./img/product.png" alt="Customer Review">
              </div>
              <div class="mt-5 d-flex flex-column" style="text-align: justify;">
                  <h3>Asep Karbu</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis magnam doloribus et architecto maiores eum dolor minima vel pariatur ullam. Ex, vitae ipsum praesentium voluptate esse doloribus voluptates reprehenderit tempore nobis amet perferendis, odit fugiat adipisci! Eligendi in ipsa at quis, provident deleniti officiis nostrum, molestiae amet labore ipsam consectetur?</p>
              </div>
            </div>
            <div class="container mt-2 mb-2 d-flex justify-content-end">
              <a href="../ulasan/ulasan.php" target="_blank" class="btn" style="background-color: #123159; color: white;">More Review</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      function updatequantity(amount) {
        const quantityinput = document.getElementById("quantity");
        let currentquantity = parseInt(quantityinput.value);
        currentquantity += amount;
        if (currentquantity < 1) currentquantity = 1;
        if (currentquantity > <?= $detailproduct["stock_product"]; ?>) currentquantity = <?= $detailproduct["stock_product"]; ?>;
        quantityinput.value = currentquantity;
      }
    </script>
  </body>
</html>
