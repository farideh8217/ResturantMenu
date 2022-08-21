<?php
session_start();

$database = [
    'host' => 'localhost',
    'dbname' => 'resturantmenu',
    'user' => 'root',
    'pass' => ''
];
try {
    $db = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database['user'], $database['pass']);
} catch (PDOException $e) {
    exit("An error happend, Error: " . $e->getMessage());
}

function auth()
{
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
        exit();
    }
}


function getresturants()
{
    global $db;

    $sql = "SELECT * FROM `resturant`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $resturants = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resturants;
}

function getfoods(int $resturant_id)
{
    global $db;

    $sql = "SELECT * FROM `food` WHERE `resturant_id`= :resturant_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":resturant_id", $resturant_id);
    $stmt->execute();
    $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $foods;
}

function getresturant(int $resturant_id)
{
    global $db;

    $sql = "SELECT * FROM `resturant` WHERE id= :resturant_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":resturant_id", $resturant_id);
    $stmt->execute();
    $resturant = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resturant;
}

function InsertFood($name_food,$price,$image) 
{
    global $db;

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

function GetFood($id)
 {
    global $db;

    $sql = "SELECT * FROM food WHERE id=?;";
    $select = $db->prepare($sql);
    $select->bindValue(1, $id);
    $select->execute();
    $food = $select->fetch(PDO::FETCH_ASSOC);
    if ($food === false) {
        header("Location: index.php");
        exit();
    }
    return $food;
}

function UpdateFood($name_food,$price,$image,$id) 
{
    global $db;

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

function DeleteFood(int $id) 
{
    global $db;

    $sql = "DELETE FROM food WHERE id = ?;";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        $id
    ]);
}