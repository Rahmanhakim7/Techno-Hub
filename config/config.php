<?php
$conn = mysqli_connect("localhost", "root", "", "technohub_db");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    
    return $rows;
}

function productdetail($id) {
    global $conn;

    $query = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    return mysqli_fetch_assoc($result);
}

function addtocart($id, $quantity) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    if (isset($_SESSION["cart"][$id])) {
        $_SESSION["cart"][$id] += $quantity;
    } else {
        $_SESSION["cart"][$id] = $quantity;
    }
}

function buynow($id, $quantity) {
    global $conn;

    $product = productdetail($id);
    if ($product["stock_product"] >= $quantity) {
        $new_stock = $product["stock_product"] - $quantity;
        $query = "UPDATE product SET stock_product = $new_stock WHERE id = $id";
        mysqli_query($conn, $query);
        addtocart($id, $quantity);
    } else {
        echo "Stock is not enough.";
    }
}

function getcartproducts($cartitems) {
    global $conn;

    $ids = implode(",", array_keys($cartitems));

    if (empty($ids)) {
        return [];
    }

    $query = "SELECT * FROM product WHERE id IN ($ids)";
    return query($query);
}

function removefromcart($id) {
    if (isset($_SESSION["cart"][$id])) {
        unset($_SESSION["cart"][$id]);
    }
}

function updatecartquantity($id, $quantity) {
    if (isset($_SESSION["cart"][$id])) {
        if ($quantity <= 0) {
            removefromcart($id);
        } else {
            $_SESSION["cart"][$id] = $quantity;
        }
    }
}

function search($keyword) {
    $query = "SELECT * FROM product
                WHERE
                name_product LIKE '%$keyword%'";
    
    return query($query);
}

function registration($data) {
    global $conn;

    $name = $data["name"];
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO auth_users VALUES('', '$name', '$email', '$password')");

    return mysqli_affected_rows($conn);
}
?>