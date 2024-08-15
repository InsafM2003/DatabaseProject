<?php
//Insaf Mohamed Umar, 1001808683
//Darshan Bastola, 1001901484
require './Service.php';
$service = new Service();
$students = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
    
    // Fetch the item details for the provided search query
    $students = $service->fetchAllItems($searchQuery);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<body>
    <div>ITEMS</div>

    <!-- Search form -->
    <form method="post">
        <input type="text" name="search" placeholder="Search by Item Name">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>iId</th>
                <th>Iname</th>
                <th>Sprice </th>
                <!--<th>Update</th>
                <th>Delete</th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $item) : ?>
                <tr>
                    <td><?= htmlspecialchars($item->iId); ?></td>
                    <td><?= htmlspecialchars($item->Iname); ?></td>
                    <td><?= htmlspecialchars($item->Sprice); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- <?php foreach ($students as $item) : ?>
        
        <p><?= htmlspecialchars($item->name); ?></p>
    <?php endforeach; ?> -->
</body>

</html>