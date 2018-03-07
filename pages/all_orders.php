<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
require_once('../includes/init.php');

// Here you might connect to the database and show off some of your newest guitars.
require_once('../includes/db.php');

$query = 'SELECT CONCAT(firstName, " ", lastName) AS Name, emailAddress, orderDate
          FROM customers
          JOIN orders ON customers.customerID = orders.customerID';
$statement = $conn->prepare($query);
$statement->execute();
$orders = $statement->fetchAll();
$statement->closeCursor();


?>
<?php include './views/header.php'; ?>
  <div class="col-sm-6">
        <h1>All Orders</h1>
        <table class="table table-hover">
          <thead class="thead-dark">
              <th>Name</th>
              <th>Email</th>
              <th>Date</th>
          </thead>
              <?php foreach ($orders as $order) : ?>
                <tr>
                <td><?php echo $order['Name'] ?></td>
                <td><?php echo $order['emailAddress'] ?></td>
                <td><?php echo $order['orderDate'] ?></td>
                </tr>
              <?php endforeach ?>
        </table>
        <a href="../index.php" class="btn btn-light btn-lg" role="button">Go Back</a>
      </div>
      <div class="col"></div>
<?php include './views/footer.php'; ?>
