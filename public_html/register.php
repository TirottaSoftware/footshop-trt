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
    <div class="auth-container" id = "register">
        <div class="side-panel">
            <h1>Welcome to TRT</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum obcaecati dignissimos natus quidem voluptatum, temporibus tempora delectus ex porro eligendi consectetur vel commodi explicabo ea.</p>
        </div>
        <div class="auth-form">
            <h1>Register</h1>
            <form method = "POST" action = "auth/registerUser.php">
                <input type="text" name = "username" placeholder="username" />
                <input type = "password" name = "password" placeholder = "password" />
                <input type = "password" name = "passwordconfirm" placeholder = "confirm password" />
                <input id = "btn-auth" type = "submit" value = "Register" />
            </form>
            <label>Already a User? <a href = "login.php">Sign in</a></label>
        </div>
    </div>
</body>
</html>