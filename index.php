<?php
require "connection.php";

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
    <?php if(!isset($_GET["submit"])) { ?>
        <form action="" method="GET">
            <select name="resturant_id">
                <?php foreach($resturants as $resturant) { ?>
                    <option value="<?php echo $resturant["id"]?>"><?php echo $resturant["name_resturant"]?></option>
                <?php } ?>    
            </select>  
            <input type="submit" value="submit" name="submit">  
        </form> 
    <?php } else { ?>
        <?php
        $resturant_id = $_GET["resturant_id"];
        $rest = getresturant($resturant_id);
        if ($rest === false) {
            echo "این رستوران وجود ندارد";
        }else {
        $foods = getfoods($resturant_id);
        ?>
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
    <?php } ?>
    <?php } ?>
</body>
</html>
