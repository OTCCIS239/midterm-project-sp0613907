<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
require_once('../includes/init.php');

// Here you might connect to the database and show off some of your newest guitars.
require_once('../includes/db.php');

$orderID = filter_input(INPUT_GET, 'orderID');

$query = 'SELECT orderDate, shipDate, cardNumber, CONCAT(line1, " ", line2, " ", city, " ", state, " ", zipCode) AS address, productName, listPrice, discountAmount, taxAmount, shipAmount
          FROM orders
          JOIN addresses ON orders.billingAddressID = addresses.addressID
          JOIN customers ON orders.customerID = customers.customerID
          JOIN orderitems ON orders.orderID = orderitems.orderID
          JOIN products ON orderitems.productID = products.productID
          WHERE orders.orderID = :orderID';
$statement = $conn->prepare($query);
$statement->bindValue(':orderID', $orderID);
$statement->execute();
$details = $statement->fetchAll();
$statement->closeCursor();
var_dump($orderID);
die();
?>
<?php include './header.php'; ?>
<div class="col">
  <h3>Order Details</h3>
  <table class="table table-striped">
    <thead class="thead-dark">
        <th>Order Date</th>
        <th>Ship Date</th>
        <th>Card #</th>
        <th>Address</th>
        <th>Product</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Tax</th>
        <th>Shipping</th>
        <th class="text-right">Total</th>
    </thead>
        <?php foreach ($details as $detail) : ?>
        <tr>
          <td><?php echo $detail['orderDate'] ?></td>
          <td><?php echo $detail['shipDate'] ?></td>
          <td><?php echo $detail['cardNumber'] ?></td>
          <td><?php echo $detail['address'] ?></td>
          <td><?php echo $detail['productName'] ?></td>
          <td><?php echo $detail['listPrice'] ?></td>
          <td><?php echo $detail['discountAmount'] ?></td>
          <td><?php echo $detail['taxAmount'] ?></td>
          <td><?php echo $detail['shipAmount'] ?></td>
          <td><?php echo $total = $detail['listPrice'] - $detail['discountAmount'] + $detail['taxAmount'] + $detail['shipAmount'] ?></td>
        </tr>
        <?php endforeach ?>
  </table>
  <a href="all_orders.php" class="btn btn-light btn-lg" role="button">Go Back</a>
</div>






<?php include './footer.php'; ?>
