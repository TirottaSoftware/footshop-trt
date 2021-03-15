<h1>Select a product</h1>
<form method="post" action = "remove.php">
    <select name = "productId" class="admin-select">
        <?php 
            require "../../../resources/db.php";
            $sql = "SELECT * FROM products";
            $sth = $conn->query($sql);

            foreach ($sth as $row){
                echo "<option value=\"". $row['Id']."\">".$row['Name'] ."</option>";
            }
        ?>
    </select>
    <input type = "submit" name = "submit" class = "admin-submit" value = "Remove"/>
</form>
<?php 
    if(isset($_POST['submit'])){
        if(!empty($_POST['productId'])) {
            $id = $_POST['productId'];

            $sql = "DELETE FROM products WHERE Id = ".$id;
            $sth = $conn->query($sql);

            header("Location: products.php");
        }
    }
?>