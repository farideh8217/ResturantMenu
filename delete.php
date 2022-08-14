<?php
require "connection.php";

if (!isset($_SESSION['id']))  { 
	header("Location: login.php");
	exit();
}

$id = $_GET["id"];

$sql = "DELETE FROM food WHERE id = ?;";
$stmt = $db->prepare($sql);
$stmt->execute([
    $id
]);

header("Location: index.php");



