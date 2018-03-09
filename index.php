<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
// This line should be on every page you create.
require_once('./includes/init.php');

// Here you might connect to the database and show off some of your newest guitars.
require_once('./includes/db.php');

    // $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    // if($category_id == null || $category_id == false){
    //     $category_id = 1;
    // }

    //category
    // $query = 'SELECT * FROM categories WHERE categoryID = :category_id';
    // $statement = $conn->prepare($query);
    // $statement->bindValue(':category_id', $category_id);
    // $statement->execute();
    // $category = $statement->fetch();
    // $category_name = $category['categoryName'];
    // $statement->closeCursor();

    // var_dump($host);
    // die();

    //categories
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $statement = $conn->prepare($query);
    // $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();

    // var_dump($categories);
    // die();

?>
<?php include './pages/views/header.php'; ?>

            <div class="col-sm-6">

            </div>
            <div class="col"></div>
        </div>
</div>
<?php include './pages/views/footer.php' ?>
