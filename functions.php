<?php
$id = $name = $price = "";
$idErr = $nameErr = $priceErr = "";

if (isset($_POST['submit'])) {
    if (empty($_POST["id"])) {
        $idErr = "ID is required";
    } elseif (!preg_match('/^[0-9]*$/', $_POST['id']) || 0 >= $_POST['id']) {
        $idErr = "ID is incorrect";
    } else {
        $id = test_input($_POST["id"]);
    }

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } elseif (!preg_match('/^[A-Z]{1}[A-Za-z0-9\s]*$/', $_POST['name'])) {
        $nameErr = "Name is incorrect";
    } else {
        $name = test_input($_POST["name"]);
    }
    if (empty($_POST["price"])) {
        $priceErr = "Price is required";
    } elseif (!preg_match('/^\d*\.?\d+$/', $_POST['price']) || 0 >= $_POST['price'] || 1000 < $_POST['price']) {
        $priceErr = "Price is invalid";
    }

    if ($idErr == "" && $nameErr == "" && $priceErr == "") {
        header('Location: ../a3/index.php');
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>