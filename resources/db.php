<?php 
    $username = "sql4399061";
    $password = "AMkyubG3en";

    $conn = new PDO("mysql:host=sql4.freesqldatabase.com;dbname=sql4399061", $username,  $password);


     function getUser(){
        if(!isset($_SESSION)){
            session_start();
        }
        
        $username = "sql4399061";
        $password = "AMkyubG3en";
        $conn = new PDO("mysql:host=sql4.freesqldatabase.com;dbname=sql4399061", $username,  $password);

        $userId = $_SESSION['uid'];
        $sql = "SELECT * FROM users WHERE Id = $userId";
        $sth = $conn->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }
?>