<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
require_once('../includes/init.php');

// Here you might connect to the database and show off some of your newest guitars.
require_once('../includes/db.php');

$queryOrders = 'SELECT * FROM customers  JOIN orders ON customers.customerID = orders.CustomerID WHERE shipDate IS NULL';
$statement2 = $conn->prepare($queryOrders);
    $statement2->execute();
    $orders = $statement2->fetchAll();
    $statement2->closeCursor();
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm"></div>
                <div class="col-sm-8">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm"></div>
                
            </div>
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-6">
                    
                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            
                        </tr>

                        <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= $order['firstName']; ?> <?= $order['lastName']; ?></td>
                            <td><?= $order['orderID']; ?></td>
                            <td><?= $order['orderDate']; ?></td>
                            <td><button>view more</button>
                            
                        </tr>
                        <?php endforeach; ?>            
                    </table>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>