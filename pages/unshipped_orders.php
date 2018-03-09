<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
require_once('../includes/init.php');

// Here you might connect to the database and show off some of your newest guitars.
require_once('../includes/db.php');

$query = 'SELECT orderID, CONCAT(firstName, " ", lastName) AS Name, emailAddress, orderDate
          FROM customers
          JOIN orders ON customers.customerID = orders.customerID
          WHERE shipDate IS NULL';
$statement = $conn->prepare($query);
// $statement->bindValue(':orderID', $orderID);
$statement->execute();
$orders = $statement->fetchAll();
$statement->closeCursor();
?>

<?php include './header.php'; ?>

<div class="col-sm-2"></div>
  <div class="col-sm-8">
        <h3>Unshipped Orders</h3>
        <table class="table table-striped">
          <thead class="thead-dark">
              <th>Name</th>
              <th>Email</th>
              <th>Date</th>
              <th>       </th>
          </thead>
              <?php foreach ($orders as $order) : ?>
              <tr>
                <td><?php echo $order['Name'] ?></td>
                <td><?php echo $order['emailAddress'] ?></td>
                <td><?php echo $order['orderDate'] ?></td>
                <td><a href="order_details.php?orderID=<?php echo $order['orderID']?>">More Info</a></td>
              </tr>
              <?php endforeach ?>
        </table>
        <a href="../index.php" class="btn btn-light btn-lg" role="button">Go Back</a>
      </div>

<?php include './footer.php'; ?>
