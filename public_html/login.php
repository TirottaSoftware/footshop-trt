<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Sign up</title>
</head>
<body class = "body-login">
    <?php include 'nav.php'?>
    <div class="auth-container">
        <div class="side-panel">
            <h1>Welcome back!</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum obcaecati dignissimos natus quidem voluptatum, temporibus tempora delectus ex porro eligendi consectetur vel commodi explicabo ea.</p>
        </div>
        <div class="auth-form">
            <h1>Login</h1>
            <form method="post" action = "auth/login.php">
                <input type="text" placeholder="username" name = "username" />
                <input type = "password" placeholder = "password" name = "password"/>
                <input id = "btn-auth" type = "submit" value = "Log in" />
            </form>
            <label>Don't have an account? <a href = "register.php">Register Here</a></label>
        </div>
    </div>
</body>
</html>