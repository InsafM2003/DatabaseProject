<?php
//Insaf Mohamed Umar, 1001808683
//Darshan Bastola, 1001901484
require './Service.php';

$service = new Service();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $result = $service->addItem();
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Add Item </title>
    </head>
    <body>
        <form method="post">
        <fieldset>
            <legend> Add Item</legend>

            <input type="text" name="id" placeholder="ID"></br>

            <input type="text" name="name" placeholder="Name" ></br>

            <input type="text" name="price" placeholder="Price" ></br>

            <input id="button" type="submit" name="submit">
        </fieldset>
        <!-- <?= htmlspecialchars($result); ?> -->
    </body>

</html>