<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
require_once('../includes/init.php');
require_once('../includes/db.php');

$orders = getMany("SELECT * FROM customers JOIN orders ON customers.customerID = orders.CustomerID", [], $conn);

// Here you might connect to the database and show off some of your newest guitars.

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
            <h1>ORDERS</h1>
            <?php foreach ($orders as $order) : ?>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="heading<?= $order['orderID'] ?>">
                            <h5 class="mb-0">
                                Customer Name: <?= $order['firstName']; ?> <?= $order['lastName']; ?> Email Address: <?= $order['emailAddress']; ?> Order Date: <?= $order['orderDate']; ?>
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $order['orderID'] ?>" aria-expanded="false" aria-controls="<?= $order['orderID'] ?>">
                                View Full Order
                                </button>
                            </h5>
                        </div><!--Ends card-header -->
                        <div id="collapse<?= $order['orderID'] ?>" class="collapse" aria-labelledby="heading<?= $order['orderID'] ?>" data-parent="#accordion">
                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, 
                                non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid 
                                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. 
                                Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of 
                                them accusamus labore sustainable VHS.
                            </div>
                        </div><!--Ends collapsable section-->
                    </div><!--Ends Card -->
                </div><!--Ends accordion-->
            <?php endforeach; ?>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>