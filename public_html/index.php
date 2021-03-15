<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>TRT Footshop</title>
</head>
<body>
    <?php include 'nav.php'?>
    <div class="hero"></div>
    <section id="popular">
        <h1 class="section-title">Popular</h1>
        <div class="popular-container">
            
            <?php
                require('../resources/db.php');

                $sql = "SELECT * FROM products WHERE Category = 'Popular' LIMIT 2";
                $sth = $conn->query($sql);
                foreach ($sth as $row){
                    echo 
                    "
                        <div class=\"product-popular\">
                            <img src = \"". $row['ImageUrl'] . "\" />
                            <div class=\"product-info\">
                                <h1>". $row['Name'] ."</h1>
                                <p>". $row['Description']."</p>
                                <h3>Price: $".$row['Price']."</h3>
                                <a href =\"product.php?id=".$row['Id']."\">Learn More</a>
                            </div>
                        </div>
                    ";
                }
            ?>
        </div>
    </section>
    <div id="hero-adidas">
        <div class="overlay"></div>
        <div class="hero-desc">
            <h1>Adidas AdiStark 3.0</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt itaque expedita laborum architecto illo dolore sed optio in perspiciatis. Cumque.</p>
            <a href="product.php?id=10">Shop</a>
        </div>
    </div>
    <div class="about">
        <h1 class="section-title">About Us</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est corrupti officiis ex vero, fugiat animi molestiae, obcaecati quisquam fuga deleniti tempora inventore facere eveniet aut voluptas dolorem. Quae commodi velit amet magni iste ea cumque sed? Iusto nisi suscipit sunt!</p>
        <br>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est corrupti officiis ex vero, fugiat animi molestiae, obcaecati quisquam fuga deleniti tempora inventore facere eveniet aut voluptas dolorem. Quae commodi velit amet magni iste ea cumque sed? Iusto nisi suscipit sunt!</p>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>