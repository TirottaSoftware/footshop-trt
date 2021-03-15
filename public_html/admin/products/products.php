<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body id ="body-admin">
    <?php include '../admin-sidebar.php' ?>
<div class="page-content">
    <div class="products-summary">
        <?php
            require "../../../resources/db.php";

            $sql = "SELECT COUNT(*) as 'count' FROM products";
            $sth = $conn->query($sql);
    
            $count;
            foreach ($sth as $row){
                $count = $row['count'];
            }
            
            $male = $sql . " WHERE Gender = 'Male'";
            $sth = $conn->query($male);

            $maleCount;
            foreach ($sth as $row){
                $maleCount = $row['count'];
            }

            $female = $sql . " WHERE Gender = 'Female'";
            $sth = $conn->query($female);

            $femaleCount;
            foreach ($sth as $row){
                $femaleCount = $row['count'];
            }
        ?>
        <div class="summary-card">
            <p>Total Products</p>
            <h1><?php echo $count; ?></h1>
        </div>
        <div class="summary-card">
            <p>Male Products</p>
            <h1><?php echo $maleCount; ?></h1>
        </div>
        <div class="summary-card">
            <p>Female Products</p>
            <h1><?php echo $femaleCount; ?></h1>
        </div>
    </div>
    <div class="product-actions">
        <a id = "add">Add a Product</a>
        <a id = "remove">Remove a Product</a>
    </div>
    <div class="action"></div>
</div>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#add").click(function() {
            $(".action").load("add.php");
        });
        $("#remove").click(function() {
            $(".action").load("remove.php");
        });
        $("#edit").click(function() {
            $(".action").load("edit.php");
        });
    });
</script>
</body>
</html>