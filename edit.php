<?php
require "connection.php";

if (!isset($_SESSION['id']))  { 
	header("Location: login.php");
	exit();
}

$id = $_GET['id'];
$select = $db->prepare("SELECT * FROM food WHERE id=?;");
$select->bindValue(1, $id);
$select->execute();
$food = $select->fetch(PDO::FETCH_ASSOC);
if ($food === false) {
  header("Location: index.php");
  exit();
}

if (isset($_POST['submit'])) {
    $name_food = $_POST['name_food'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    

    $sql = "UPDATE food SET name_food=?, price=?, image=? WHERE id=?;";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $name_food);
    $stmt->bindValue(2, $price);
    $stmt->bindValue(3, $image);
    $stmt->bindValue(4, $id);
    $stmt->execute();

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
        <input type="submit" name="submit" value="ویرایش">
    </form>
</body>
</html>
