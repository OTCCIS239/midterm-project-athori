<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
require_once('./includes/init.php');

// Here you might connect to the database and show off some of your newest guitars.
require_once('./includes/db.php');


$unshippedOrders = getMany('SELECT * FROM customers JOIN orders ON customers.customerID = orders.CustomerID WHERE shipDate IS NULL', [], $conn);
?>
<!doctype html>
<html lang="en">
    <head>
        <?php include 'head.php';?>
    </head>
    <body>
        <div>
            <?php include 'menu.php';?>
        <div>
    <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h1>ALL ORDERS</h1>
                </div>
            </div>
            <div class"row">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Order #</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Order Date</th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($unshippedOrders as $unshippedOrder): ?>
                            <tr>
                                <th scope="row"><?= $unshippedOrder['orderID']; ?></th>
                                <td><?= $unshippedOrder['firstName']; ?> <?= $unshippedOrder['lastName']; ?> </td>
                                <td><?= $unshippedOrder['emailAddress']; ?> </td>
                                <td><?= $unshippedOrder['orderDate']; ?></td>
                                
                                <td><a href="order_details.php?varname=<?php echo $unshippedOrder['orderID']; ?>">View Info</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <?php include 'footer.php';?>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>