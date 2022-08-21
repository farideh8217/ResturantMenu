<?php
require "connection.php";

if (isset($_POST['sub'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM  resturant WHERE  username=? and password=?";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $username);
    $stmt->bindValue(2, $password);
    $stmt->execute();
    $resturant = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($stmt->rowCount() >= 1) {
        $_SESSION['id'] = $resturant['id'];
        header("Location: index.php");
        exit();
    } else {
        echo "نام کاربری یا رمزعبور اشتباه است";
    }
}
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css"
          integrity="sha384-P4uhUIGk/q1gaD/NdgkBIl3a6QywJjlsFJFk7SPRdruoGddvRVSwv5qFnvZ73cpz" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <div class="register" style="text-align:center;">
        <form action="" method="POST">
            <h4>ورود به حساب کاربری</h4>
            <input name="username" type="text" placeholder="نام کاربری" class="form-control"><br>
            <input name="password" type="password" placeholder="رمزعبور" class="form-control"><br>
            <input name="sub" type="submit" value="ورود به حساب" class="btn btn-info form-control"><br><br>
        </form>
    </div>
</div>
</body>
</html>

