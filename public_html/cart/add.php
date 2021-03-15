<?php 
    require "../../resources/db.php";

    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: https://localhost:4433/footshop-tirotta/public_html/login.php");
    }
    $productId = $_GET['pid'];
    $userId = $_SESSION['uid'];

    $quantity;

    //TODO: Implement Qunatity feature
    $quantityCheck = "SELECT * FROM cart WHERE userId = $userId AND productId = $productId";
    $quantity;
    $sth = $conn->query($quantityCheck);
    $result = $sth->fetchAll();
    if($result != null){
        foreach($result as $row){
            $quantity = $row['Quantity'] + 1;
        }
        $setQuantity = "UPDATE cart SET Quantity = $quantity WHERE ProductId = $productId AND UserId = $userId";
        $stmt = $conn->query($setQuantity);
        
    }
    else{
        $sql = "INSERT INTO cart (UserId, ProductId, Quantity) VALUES (?,?,?)";
        $sth = $conn->prepare($sql);
        $sth->execute([$userId, $productId, 1]);
    
        $result = $sth->fetchAll();
    }
    
    header("Location: https://localhost:4433/footshop-tirotta/public_html/cart.php")
?>