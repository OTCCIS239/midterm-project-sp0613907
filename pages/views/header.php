<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/midterm-project-sp0613907/includes/init.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/midterm-project-sp0613907/includes/init.php');

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
    <link rel="stylesheet" type="text/css" media="screen" href="/midterm-project-sp0613907/master.css" />

</head>
<body>
<div class="container-fluid">
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/midterm-project-sp0613907/index.php">
      <img src="/midterm-project-sp0613907/pick.png" alt="guitar pick" width="30" height="30" class="d-inline-block align-top ">
      The Pick
    </a>


      <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->

      <!-- <div class="collapse navbar-collaps" id="navbarSupportedContent"> -->
        <ul class="nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php foreach ($categories as $category): ?>
                <a class="dropdown-item" href="?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName'];?>
                </a>
            <?php endforeach?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/midterm-project-sp0613907/pages/all_orders.php">Orders</a>
          </li><li class="nav-item">
            <a class="nav-link" href="/midterm-project-sp0613907/pages/unshipped_orders.php">Unshipped</a>
          </li>
      <!-- </div> -->
    </nav>

<div class="row">
    <!-- <div class="col-sm-3">
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
                <li><a href="/midterm-project-sp0613907/pages/all_orders.php">Orders</a></li>
            </ul>
        </nav>
    </div> -->
