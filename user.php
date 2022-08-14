<?php
require "connection.php";

if (!isset($_SESSION['id']))  { 
	header("Location: login.php");
	exit();
}

$resturant_id = $_SESSION['id'];
$rest = getresturant($resturant_id);
if ($rest === false) {
    header("Location: login.php");
	exit();
}
$foods = getfoods($resturant_id);
$resturants = getresturants();
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
    <?php echo $rest["name_resturant"];?>
    <table border="2">
        <tr>
            <th>Name</th>
            <th>price</th>
        </tr> 
        <?php foreach ($foods as $food) { ?>
            <tr>
                <td><?= $food["name_food"]?></td>
                <td><?= $food["price"]?></td> 
            </tr>  
        <?php } ?>
    </table>
</body>
</html>
