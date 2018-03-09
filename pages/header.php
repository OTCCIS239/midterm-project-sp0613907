<?php
require_once('../includes/init.php');
require_once('../includes/db.php');

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
    <title>The Pick</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../master.css" />

</head>
<body>
<div class="container-fluid">
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">
      <img src="../pick.png" alt="guitar pick" width="30" height="30" class="d-inline-block align-top ">
      The Pick
    </a>

        <ul class="nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php foreach ($categories as $category): ?>
                <a class="dropdown-item" href="../index.php?categoryID=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName'];?>
                </a>
            <?php endforeach?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/all_orders.php">Orders</a>
          </li><li class="nav-item">
            <a class="nav-link" href="../pages/unshipped_orders.php">Unshipped</a>
          </li>
    </nav>

<div class="row">
