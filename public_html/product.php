<?php 
    $id = $_GET['id'];
    $productName = "";
    $productPrice = "";
    $productDescription = "";
    $productImage = "";

    require "../resources/db.php";
    $sql = "SELECT * FROM products WHERE Id = $id";
    $sth = $conn->query($sql);
    $result = $sth->fetchAll();

    foreach ($result as $row){
        $productName = $row['Name'];        
        $productPrice = $row['Price'];
        $productImage = $row['ImageUrl'];
        $productDescription = $row['Description'];
    }
?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Poppins:wght@200;300&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $productName ?></title>
</head>
<body id = "body-product">
    <?php include 'nav.php'?>
    <div class="product-box">
        <img src="<?php echo $productImage ?>"/>
        <div class="desc-box">
            <h1><?php echo $productName; ?></h1>
            <h2>$<?php echo $productPrice; ?></h2>
            <p><?php echo $productDescription; ?></p>
            <div class="size-select">
                <label>Size</label>
                <select name="size">
                    <option value="">39</option>
                    <option value="">40</option>
                    <option value="">41</option>
                    <option value="">42</option>
                    <option value="">43</option>
                    <option value="">44</option>
                </select>
            </div>
            <a href= "cart/add.php?id=<?php echo $id ?>" class = "admin-submit">Add to Cart</a>
        </div>
    </div>
</body>
</html>