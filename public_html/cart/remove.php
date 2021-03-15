<?php

    require "../../resources/db.php";

    $productId = $_GET['id'];
    session_start();
    $userId = $_SESSION['uid'];

    $sql = "DELETE FROM cart WHERE ProductId = $productId AND UserId = $userId";
    $sth = $conn->query($sql);
    
    header("Location: https://localhost:4433/footshop-tirotta/public_html/cart.php");
?>
