<?php
require '../config/config.php';

if (isset($_POST["register"])) {
  if (registration($_POST) > 0) {
    echo "<script>
            alert('User baru berhasil ditambahkan!');
            window.location.href = '../landingpage/index.php';
          </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container-login">
      <div class="container px-4 py-4 d-flex flex-row gap-4 rounded-4">
        <img src="logotech.png" alt="LogotechNoHub" />
        <div class="container">
          <form method="post">
            <h2>Hello,Everyone</h2>
            <p class="mb-5">we are glad you are here!</p>
            <div class="mb-2 position-relative">
              <img
                class="image-email"
                src="name.png"
                alt="name"
                width="20px"
                height="20px"
              />
              <input
                type="name"
                class="form-control name rounded-4"
                id="name"
                name="name"
                aria-describedby="emailHelp"
                placeholder="Name"
                autocomplete="off"
              />
              <hr class="position-absolute translate-middle-x email" />
            </div>
            <div class="mb-2 position-relative">
              <img
                class="image-email"
                src="email.png"
                alt="email"
                width="20px"
                height="20px"
              />
              <input
                type="email"
                class="form-control email rounded-4"
                id="email"
                name="email"
                aria-describedby="emailHelp"
                placeholder="Email"
                autocomplete="off"  
              />
              <hr class="position-absolute translate-middle-x email" />
            </div>
            <div class="mb-2 mt-n5 position-relative">
              <img
                class="image-password"
                src="password.png"
                alt="password"
                width="20px"
                height="20px"
              />
              <input
                type="password"
                class="form-control password rounded-4"
                id="password"
                name="password"
                placeholder="Password"
              />
              <hr class="position-absolute translate-middle-x email" />
            </div>
            <div class="mb-5">
              <button
                type="submit"
                class="button-login btn btn-primary mb-4 w-100 rounded-4"
                name="register"
              >
                Register
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
