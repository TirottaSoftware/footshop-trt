<?php 
    require "db.php";
    $gender = $_POST['gender'];

    $sql = "SELECT * FROM products WHERE Gender = '$gender' ";

    if($_POST['brand'] == "none"){
        if($_POST['price'] == "none"){

        }
        else{
            if(isset($_POST['price'])){
                $sql .= "AND price ";
                if($_POST['price'] == "0to50" ){
                    $sql .= "BETWEEN 0 AND 50";
                }
                else if($_POST['price'] == "51to100"){
                    $sql .= "BETWEEN 51 AND 100";
                }
                else if($_POST['price'] == "101to200"){
                    $sql .= "BETWEEN 101 AND 200";
                }
                else if($_POST['price'] == "200+"){
                    $sql .= "> 200";
                }
                else{
    
                }
            }
        }
    }
    else{
        $sql .= "AND Brand = '".$_POST['brand'] ."' ";
        if($_POST['price'] == "none"){
            
        }
        else{
            if(isset($_POST['price'])){
                $sql .= "AND price ";
                if($_POST['price'] == "0to50" ){
                    $sql .= "BETWEEN 0 AND 50";
                }
                else if($_POST['price'] == "51to100"){
                    $sql .= "BETWEEN 51 AND 100";
                }
                else if($_POST['price'] == "101to200"){
                    $sql .= "BETWEEN 101 AND 200";
                }
                else if($_POST['price'] == "200+"){
                    $sql .= "> 200";
                }
                else{
    
                }
            }
        }
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rows = $stmt->rowCount();
    $output = "";

    if($rows > 0){
        foreach($result as $row){
            $output .=  
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
    }
    else{
        $output .= "No products found.";
    }
    
    echo $output;
?>