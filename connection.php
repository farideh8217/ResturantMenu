<?php
session_start();

$database = [
  'host'=>'localhost',
  'dbname'=>'resturantmenu',
  'user'=>'root',
  'pass'=>''
];
try {
  $db = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database['user'], $database['pass']);
} catch (PDOException $e) {
  exit("An error happend, Error: " . $e->getMessage());
}
///////////////////////////////////
function getresturants() {
  global $db ;

	$sql="SELECT * FROM `resturant`";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$resturants = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $resturants;
}
function getfoods(int $resturant_id) {
  global $db;

    $sql="SELECT * FROM `food` WHERE `resturant_id`= :resturant_id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(":resturant_id",$resturant_id);
	$stmt->execute();
	$foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $foods;
}
function getresturant(int $resturant_id) {
	global $db;

	$sql = "SELECT `id` FROM `resturant` WHERE id= :resturant_id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(":resturant_id",$resturant_id);
	$stmt->execute();
	$food= $stmt->fetch(PDO::FETCH_ASSOC);
	return $food;
}

