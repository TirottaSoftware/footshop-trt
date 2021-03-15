<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for your purchase!</title>
</head>
<body>
    <?php 
        $totalPrice = 0;
        $quantity = 0;

        session_start();
        $userId = $_SESSION['uid'];
    
        require "../../resources/db.php";
        $result = getUser();
        foreach ($result as $row){
            $quantity = $row['TotalProductPurchased'];
            $totalPrice = $row['TotalPurchases'];
        }

        //UPDATE PRODUCT DB
        $updatedPurchases = $totalPrice + $_GET['totalPrice'];
        $updatedQuantity = $quantity +  $_GET['quantity'];
        
        $sql = "UPDATE users SET TotalPurchases = $updatedPurchases, TotalProductPurchased = $updatedQuantity WHERE Id = $userId";
        $conn->query($sql);
        sleep(1);
        header("Location: https://localhost:4433/footshop-tirotta/public_html/index.php");
    ?>
</body>
</html>