<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../css/style.css"/>
    <title>Cart</title>
</head>
<body>
    <?php include 'nav.php'?>
    <div class = "cart-container">
        <div class="cart-items">
            <?php 
                require "../resources/db.php";
                $userId = $_SESSION['uid'];
                $productId = 0;

                $sql = "SELECT * FROM cart INNER JOIN products ON products.Id = cart.ProductId WHERE UserId = $userId";
                $sth = $conn->query($sql);
                foreach ($sth as $row){
                    echo
                    "
                    <div class=\"cart-item\">
                        <img src = \"".$row['ImageUrl']."\"/>
                        <div class=\"item-info\">
                            <h1>".$row['Name']."</h1>
                            <p>Gender: ".$row['Gender']."</p>
                            <p>Size: 9</p>
                            <p>Quantity: ".$row['Quantity']."</p>
                            <h3>Price: $".$row['Price']."</h3>
                            <a href = \"cart/remove.php?id=".$row['ProductId']."\">Remove from cart</a>
                        </div>
                    </div>
                    ";
                }

            ?>
            
        </div>
        <div class="cart-summary">
            <h1>Order Summary</h1>
            <?php
            $totalPrice = 0;
            $quantity = 0;
            $sth = $conn->query($sql);
            foreach ($sth as $row){
                $totalPrice += $row['Price'] * $row['Quantity'];
                $quantity += $row['Quantity'];
                echo 
                "
                    <div class=\"summary-item\">
                        <p>".$row['Name']." x".$row['Quantity'].": </p>
                        <p>$".$row['Price']*$row['Quantity'].".00</p>
                    </div>
                ";
            }
            ?>
<hr>
            <div class="summary-total">
                    <h3>Total: </h3>
                    <h3>$<?php echo $totalPrice; ?>.00</h3>
                </div>
                <form method="post" action = "cart/checkout.php?totalPrice=<?php echo $totalPrice; ?>&quantity=<?php echo $quantity; ?>">
                    <input class="btn-checkout" type="submit" value = "Checkout"/>
                </form>
            </div>
    </div>
</body>
</html>