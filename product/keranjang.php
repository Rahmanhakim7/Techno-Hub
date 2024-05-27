<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../login/login.php");
  exit;
}

require '../config/config.php';

$cartitems = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
$products = getcartproducts($cartitems);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["product_id"];
  if (isset($_POST["remove_item"])) {
    removefromcart($id);
  } elseif (isset($_POST["update_quantity"])) {
    updatecartquantity($id, intval($_POST["quantity"]));
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Keranjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  </head>
  <body>
    <div class="container-fluid d-flex flex-column">
      <h2 class="container">Keranjang Saya</h2>
      <?php if (empty($products)): ?>
        <p class="container">Keranjang Anda Kosong!</p>
      <?php else: ?>
        <?php foreach ($products as $product): ?>
          <div class="mt-4 container d-flex flex-row" style="border-top: 1px solid black; border-bottom: 1px solid black">
            <div class="py-2">
              <img src="img/<?= $product["photo_product"]; ?>" class="card-img-top" alt="Product" width="100%" height="200px" />
            </div>
            <div class="d-flex flex-column">
                <h2 class="mt-3"><?= $product["name_product"]; ?></h2>
                <h3>Rp<?= $product["price_product"]; ?></h3>
                <form id="form-<?= $product["id"]; ?>" method="post" class="d-flex flex-column gap-2">
                    <input type="hidden" name="product_id" value="<?= $product["id"]; ?>">
                    <div class="d-flex flex-row gap-2">
                        <button type="button" class="btn btn-secondary" onclick="updatecartquantity(<?= $product['id']; ?>, -1)">-</button>
                        <input type="text" id="quantity-<?= $product['id']; ?>" name="quantity" value="<?= $cartitems[$product["id"]]; ?>" class="text-center px-2" style="width: 100px;" readonly>
                        <button type="button" class="btn btn-secondary" onclick="updatecartquantity(<?= $product['id']; ?>, 1)">+</button>
                        <button type="submit" name="update_quantity" class="btn btn-primary">Update</button>
                        <button type="submit" name="remove_item" class="btn btn-danger">Hapus</button>
                    </div>
                    <div class="d-flex mt-3">
                        <button class="btn btn-primary rounded-4" style="background-color: #123159; color: white;">Beli Sekarang</button>
                    </div>
                </form>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      function updatequantity(productid, amount) {
        const quantityinput = document.getElementById("quantity-" + productid);
        let currentquantity = parseInt(quantityinput.value);
        currentquantity += amount;
        if (currentquantity < 1) currentquantity = 1;
        quantityinput.value = currentquantity;
        document.getElementById("form-" + productid).submit();
      }
    </script>
  </body>
</html>
