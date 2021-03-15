<link rel="stylesheet" href="./css/style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Poppins:wght@200;300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<nav>
    <a id ="logo" href="index.php">TRT</a>
    <div class="store-links">
        <a href="men.php">Men</a>
        <a href="women.php">Women</a>
    </div>
    <div class="auth-links">
    <?php
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['username'])){
            echo
            "
            <a href = \"admin/admin.php\">". $_SESSION['username'] . "</a>
            <a href=\"auth/logout.php\">Logout</a>
            <a href = \"cart.php\"><i class=\"fas fa-cart-plus\"></i></a>
            ";
        }
        else{
            echo
            "
                <a href=\"login.php\">Login</a>
                <a href=\"register.php\">Register</a>
            ";
        }
    ?>
    </div>
    <div class="burger">
        <div class="burger-line"></div>
        <div class="burger-line"></div>
        <div class="burger-line"></div>
    </div>
    <div class="sidebar hidden">
            <a href="men.php">Men</a>
            <a href="women.php">Women</a>
            <?php
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['username'])){
            echo
            "
            <a href = \"admin/admin.php\">". $_SESSION['username'] . "</a>
            <a href=\"auth/logout.php\">Logout</a>
            <a href = \"cart.php\"><i class=\"fas fa-cart-plus\"></i></a>
            ";
        }
        else{
            echo
            "
                <a href=\"login.php\">Login</a>
                <a href=\"register.php\">Register</a>
            ";
        }
    ?>
    </div>
</nav>
<script src = "./js/nav.js"></script>