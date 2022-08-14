<?php
require "connection.php";

if (!isset($_SESSION['id']))  { 
	header("Location: login.php");
	exit();
}

if (isset($_POST['submit'])) {
    $name_food = $_POST['name_food'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    

    $sql = "INSERT INTO food SET name_food=?, price=?, image=? , resturant_id=?;";
    $insert = $db->prepare($sql);
    $insert->bindValue(1, $name_food);
    $insert->bindValue(2, $price);
    $insert->bindValue(3, $image);
    $insert->bindValue(4, $_SESSION["id"]);
    $insert->execute();

    header("location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        نام غذا:<input type="text" name="name_food"><br><br>
        قیمت غذا :<input type="text" name="price"><br><br>
        تصویرغذا:<input type="text" name="image"><br><br>
        <input type="submit" name="submit" value="افزودن غذا">
    </form>
</body>
</html>
