<?php 
    $email = $_POST['email'];
    require "../resources/db.php";
    
    $sql = "INSERT INTO newsletter (Email) VALUES (?)";
    $sth = $conn->prepare($sql);
    $result = $sth->execute([$email]);

    header("Location: index.php");
?>