<?php
session_start();
require '../config/config.php';

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
  $id = $_COOKIE["id"];
  $key = $_COOKIE["key"];

  $result = mysqli_query($conn, "SELECT email FROM auth_users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  if ($key === hash("sha256", $row["email"])) {
    $_SESSION["login"] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: ../landingpage/index.php");
  exit;
}

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM auth_users WHERE email = '$email'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;

      if (isset($_POST["rememberme"])) {
        setcookie("id", $row["id"], time()+60);
        setcookie("key", hash("sha256", $row["email"]), time()+60);
      }

      header("Location: ../landingpage/index.php");
      exit;
    }
  }

  $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Page</title>
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
      <div class="container p-4 d-flex flex-row gap-4 rounded-4">
        <img src="logotech.png" alt="LogotechNoHub" />
        <div class="container">
          <form method="post">
            <h2>Hello,Everyone</h2>
            <p class="mb-5">we are glad you are here!</p>

            <?php if (isset($error)) : ?>
              <p style="color: red;">Username atau Password salah!</p>
            <?php endif; ?>

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
            <div class="mb-3 form-check">
              <input
                type="checkbox"
                class="form-check-input remember-me"
                id="remember-me"
                name="rememberme"
              />
              <label class="form-check-label" for="remember-me"
                >Remember Me</label
              >
            </div>
            <div class="mb-5">
              <button
                type="submit"
                class="button-login btn btn-primary mb-4 w-100 rounded-4"
                name="login"
              >
                Login
              </button>
            </div>
            <div>
              <p>
                Don’t have any account?
                <a
                  href="../register/register.php"
                  class="text-decoration-none text-danger"
                  >Daftar</a
                >
              </p>
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
