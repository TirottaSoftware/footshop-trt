<?php
    require("../../resources/db.php");

    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $pwdConfirm = $_POST['passwordconfirm'];
    
    if($pwd != $pwdConfirm){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{   
        $passwordHash = password_hash($pwd, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` (`Username`, `PasswordHash`) VALUES (?,?)";
        $sth = $conn->prepare($sql);
        $sth->execute([$username, $passwordHash]);

        $result = $sth->fetchAll();
        session_start();
        $_SESSION['username'] = $username;
        header('Location: https://localhost:4433/footshop-tirotta/public_html/index.php');
    }
?>