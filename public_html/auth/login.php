<?php 
    require "../../resources/db.php";
    session_start();
    //Setup db connection
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword;
    $admin;
    $userId;

    $sql = "SELECT * FROM users WHERE Username = (?)";
    $sth = $conn->prepare($sql);
    $sth->execute([$username]) ;

    $result = $sth->fetchAll();
    foreach($result as $row){
        $hashedPassword = $row['PasswordHash'];
        $admin = $row['AdminPrivileges'];
        $userId = $row['Id'];
    }
    //Verify password
    if(password_verify($password, $hashedPassword)){
        $_SESSION['username'] = $username;
        $_SESSION['uid'] = $userId;
        $_SESSION['admin'] = $admin;
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "public_html/index.php");
    else{
        header('Location: https://localhost:4433/footshop-tirotta/public_html/index.php');
    }
?>