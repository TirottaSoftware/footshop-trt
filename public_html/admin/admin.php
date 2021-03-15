<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body id = "body-admin">
    <?php
        include 'admin-sidebar.php' ;
        require "../../resources/db.php";

        if($_SESSION['admin'] == 0){
            header('Location: https://localhost:4433/footshop-tirotta/public_html/index.php');
        }

        $sql = "SELECT COUNT(*) as totalUsers FROM users";
        $sth = $conn->query($sql);
        $result = $sth->fetchAll();

        $totalUsers = 0;
        foreach ($result as $row){
            $totalUsers = $row['totalUsers'];
        }

        $sql = "SELECT COUNT(*) as totalProducts FROM products";
        $sth = $conn->query($sql);
        $result = $sth->fetchAll();

        $totalProducts = 0;
        foreach ($result as $row){
            $totalProducts = $row['totalProducts'];
        }

        $sql = "SELECT SUM(TotalPurchases) as totalPurchases FROM users";
        $sth = $conn->query($sql);
        $result = $sth->fetchAll();

        $totalPurchases = 0;
        foreach ($result as $row){
            $totalPurchases = $row['totalPurchases'];
        }

        $sql = "SELECT * FROM `users` ORDER BY TotalPurchases DESC, TotalProductPurchased DESC";
        $sth = $conn->query($sql);
        $loyalUsers = $sth->fetchAll();

        $sql = "SELECT *  FROM newsletter ";
        $sth = $conn->query($sql);
        $newsletterResult = $sth->fetchAll();
        $newsletterUsers = $sth->rowCount();
        
    ?>
    <div class="dashboard-container">
        <div class="statistics">
            <div class="overall-statistics">
                <h1>Total Users: <?php echo $totalUsers ?></h1>
                <h1>Total Products: <?php echo $totalProducts ?></h1>
                <h1>Total Revenue: $<?php echo $totalPurchases ?></h1>
            </div>

            <div class="newsletter-statistics">
                <h1>Newsletter: <?php echo $newsletterUsers ?> users</h1>
                <div class="newsletter-item">
                    <?php 
                        foreach ($newsletterResult as $row){
                            echo " <p>".$row['Email']."</p>";
                        }
                    ?>
                   
                </div>
            </div>
        </div>
        <div class="loyal-users">
            <h1>Most Loyal customers</h1>
            <?php 
                foreach ($loyalUsers as $row){
                    echo 
                    "
                        <div class=\"user-item\">
                        <h2>".$row['Username']."</h2>
                        <p>Total purchases: $".$row['TotalPurchases']."</p>
                        <p>Total products purchased: ".$row['TotalProductPurchased']."</p>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>
</body>
</html>