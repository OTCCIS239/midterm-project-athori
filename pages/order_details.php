<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
require_once('../includes/init.php');
require_once('../includes/db.php');

$var_value = $_GET['varname'];
$customerInfo = getOne("SELECT * FROM orders JOIN customers ON orders.customerID = customers.customerID JOIN addresses ON orders.billingAddressID = addresses.addressID   WHERE orderID='$var_value'", [], $conn);
$orderInfo = getOne("SELECT * FROM orders JOIN orderItems ")
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

        <title>Chicago Guitars</title>
    </head>
    <body>
        <div class="container">
            <!--  -->
        <div class="row">
        <?php echo $var_value ?>
        
        <div class="col-md order-md-1">
          <form class="needs-validation" novalidate>
            <h4 class="mb-3">Shipping Information</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Order Date:</label>
                <input type="text" class="form-control" id="orderDate" placeholder="" value="<?= $customerInfo['orderDate']; ?>">
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Date Shipped:</label>
                <input type="text" class="form-control" id="shippingDate" placeholder="" value="<?= $customerInfo['shipDate']; ?>">
              </div>
            </div>
            <h4 class="mb-3">Customer Information</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="customerName">Customer Name:</label>
                <input type="text" class="form-control" id="customerName" placeholder="" value="<?= $customerInfo['firstName']; ?> <?= $customerInfo['lastName']; ?>">
              </div>
              <div class="col-md-6 mb-3">
                  <label for="emailAddress">Email Address:</label>
                  <input type="text" class="form-control" id="emailAddress" placeholder="" value="<?= $customerInfo['emailAddress']; ?>">
                </div>
            </div>
            <h4 class="mb-3">Billing Information</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="creditCardUsed">Credit Card Used:</label>
                <input type="text" class="form-control" id="creditCardUsed" placeholder="" value="<?= $customerInfo['cardNumber']; ?>">
              </div>
            </div>
            <div class="mb-3">
              <label for="address">Address:</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="<?= $customerInfo['line1']; ?>">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
            <div class="mb-3">
              <label for="address2">Address 2: <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="<?= $customerInfo['line2']; ?>">
            </div>
            <div class="row">
              <div class="col-md-4 mb-4">
                <label for="country">City:</label>
                <input type="text" class="form-control" id="zip" placeholder="" value="<?= $customerInfo['city']; ?>">
              </div>
              <div class="col-md-4 mb-4">
                <label for="state">State</label>
                <input type="text" class="form-control" id="zip" placeholder="" value="<?= $customerInfo['state']; ?>">
              </div>
              <div class="col-md-4 mb-4">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" value="<?= $customerInfo['zipCode']; ?>">
              </div>
            </div>
          </form>
        </div>
      </div>
            <!-- ? -->
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>