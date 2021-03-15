<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Document</title>
</head>
<body id = "body-admin">
<?php include '../admin-sidebar.php' ?>

<div class="admin-users">
    <h1>Select a user</h1>
<select id = "users-select" name = "users">
    <?php
        require "../../../resources/db.php";

        $sql  = "SELECT * FROM users";
        $sth = $conn->query($sql);
        $result = $sth->fetchAll();

        foreach ($result as $row){
            echo "<option value = \"".$row['Username']."\">".$row['Username']."</option>";
        }
    ?>
</select>

<div class="user-info"></div>
</div>
</body>
</html>

<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("#users-select").change(() => {
        console.log($("#users-select").val());
        $(".user-info").load("fetch_user.php?user=" + $("#users-select").val());
    })
</script>
