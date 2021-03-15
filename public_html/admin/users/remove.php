<?php
    $user = $_GET['username'];

    require "../../../resources/db.php";
    $sql = "DELETE FROM users WHERE Username = '$user'";
    $sth = $conn->prepare($sql);
    $sth->execute();

    header("Location: https://localhost:4433/footshop-tirotta/public_html/admin/users/index.php");
?>