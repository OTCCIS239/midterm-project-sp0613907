<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
// This line should be on every page you create.
require_once('./includes/init.php');

// Here you might connect to the database and show off some of your newest guitars.
require_once('./includes/db.php');

    $categoryID = filter_input(INPUT_GET, 'categoryID');
    if($categoryID == null || $categoryID == false){
        $categoryID = 1;
    }

    //category
    $query = 'SELECT * FROM categories WHERE categoryID = :categoryID';
    $statement = $conn->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $category = $statement->fetch();
    $category_name = $category['categoryName'];
    $statement->closeCursor();

    //products
    $query = 'SELECT * FROM products WHERE categoryID = :categoryID ORDER BY productID';
    $statement = $conn->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();

    // var_dump($categories);
    // die();

?>
<?php include './pages/views/header.php'; ?>

<div class="col">
    <h2><?php echo $category_name?></h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <th>Name</th>
            <th>Description</th>
        </thead>

        <?php foreach($products as $product) : ?>
        <tr>
            <td><?php echo $product['productName']; ?></td>
            <td><?php echo $product['description']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
        </div>
</div>
<?php include './pages/views/footer.php' ?>
