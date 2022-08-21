<?php
require "connection.php";

auth();

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}
$id = $_GET["id"];

DeleteFood($id);

header("Location: index.php");



