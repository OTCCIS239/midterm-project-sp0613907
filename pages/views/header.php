<?php
require_once('../../includes/init.php');
require_once('../../includes/db.php');

//categories
$query = 'SELECT * FROM categories ORDER BY categoryID';
$statement = $conn->prepare($query);
// $statement->bindValue(':category_id', $category_id);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Pick of Destiny</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="*" />
</head>
<body>
<div class="container">
<h1>Welcome to The Pick of Destiny</h1>
<div class="row">
    <div class="col-sm-3">
        <h2>Categories</h2>
        <nav>
            <ul>
                <?php foreach($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName'];?>
                    </a>
                </li>
                <?php endforeach?>
                <li><a href="../pages/all_orders.php">Orders</a></li>
            </ul>
        </nav>
    </div>
