<?php
    $user = $_GET['user'];
    $userTotalPurchases = 0;
    $userTotalProducts = 0;
    $userAdminRights = 0;

    require "../../../resources/db.php";
    $sql = "SELECT * FROM users WHERE Username = '$user'";
    $sth = $conn->query($sql);
    $result = $sth->fetchAll();
    
    foreach ($result as $row){
        $userTotalProducts = $row['TotalProductPurchased'];
        $userTotalPurchases = $row['TotalPurchases'];
        $userAdminRights = $row['AdminPrivileges'];
    }

    $adminLabel = "";
    if($userAdminRights == 1){
        $adminLabel = "Admin";
    }
    else{
        $adminLabel = "User";
    }
    echo 
    "
    <h2>".$user." : ".$adminLabel."
        <div class = \"user-actions\">
            <a href = \"remove.php?username=".$user."\">Remove User</a>
            <a href = \"adminize.php?username=".$user."\">Grant Admin Rights</a>
        </div>
        <div class = \"user-details\">
            <p>Total Purchases: ".$userTotalPurchases ."
            <p>Total Products Purchased: ".$userTotalProducts ."
        </div>
    ";
?>