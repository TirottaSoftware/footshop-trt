<?php 
    require "../../../resources/db.php";

    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $imageUrl = $_POST['imageurl'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `products` (`Name`, `Brand`, `Price`, `Description`, `ImageUrl`, `Gender`) VALUES (?,?,?,?,?,?)";
    $sth = $conn->prepare($sql);
    $sth->execute([$name, $brand, $price, $description, $imageUrl, $gender]);

    $result = $sth->fetchAll();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>