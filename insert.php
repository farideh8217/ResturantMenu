<?php
require "connection.php";

auth();

if (isset($_POST['submit'])) {
    $name_food = $_POST['name_food'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    InsertFood($name_food,$price,$image);
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
