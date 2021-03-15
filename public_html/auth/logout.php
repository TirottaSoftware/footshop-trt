<?php
    session_start();
    session_destroy();
    header('Location: https://localhost:4433/footshop-tirotta/public_html/index.php');
    exit();
?>