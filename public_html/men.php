<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="men-store-hero"></div>
    <div class="store-container">
        <div class="filter-container">
            <h1>Filters</h1>
            <h2>Brand</h2>
            <select id = "brand">
                <option value = "none"></option>
                <option value = "Nike">Nike</option>
                <option value = "Adidas">Adidas</option>
                <option value = "Under Armour">Under Armour</option>
                <option value = "Reebok">Reebok</option>
            </select>
            <h2>Price Range</h2>
            <select id = "price">
                <option value = "none"></option>
                <option value = "0to50">0-50</option>
                <option value = "51to100">51-100</option>
                <option value = "101to200">101-200</option>
                <option value = "200+">200+</option>
            </select>
        </div>
        <div class="product-container">
            <?php 
                require "../resources/db.php";
                $sql = "SELECT * FROM products WHERE gender = 'Male'";
                $sth = $conn->query($sql);
                foreach($sth as $row){
                    echo 
                    "
                    <div class=\"product-card\">
                        <a class=\"product-img\" href =\"product.php?id=".$row['Id']."\"><img src = \"".$row['ImageUrl']."\"/></a>
                        <div class=\"product-info\">
                            <h1>".$row['Name']."</h1>
                            <h3>Price: $".$row['Price']."</h3>
                            <a href = \"cart/add.php?pid=".$row['Id']."\">Add to Cart</a>
                        </div>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>


</body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var priceFilter = "";
    var brand = "";
    var gender = "Male";

    $("#brand").change(function(e){
        e.preventDefault();
        brand = e.target.value;

        $.post("../resources/fetch_data.php",{gender:gender, price: priceFilter, brand: brand}).done(function(data){
            
            $(".product-container").html(data);
        })
    })
    
    $("#price").change(function(e){
        e.preventDefault();
        priceFilter = e.target.value;

        $.post("../resources/fetch_data.php",{gender:gender, price: priceFilter, brand: brand}).done(function(data){
            
            $(".product-container").html(data);
        })
    })
</script>