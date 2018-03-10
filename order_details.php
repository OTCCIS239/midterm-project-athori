<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
require_once('./includes/init.php');
require_once('./includes/db.php');

$var_value = $_GET['varname'];
$customerInfo = getOne("SELECT * FROM orders JOIN customers ON orders.customerID = customers.customerID JOIN addresses ON 
                orders.billingAddressID = addresses.addressID WHERE orderID='$var_value'", [], $conn);

$ordersInfo = getMany("SELECT * FROM orders JOIN orderItems ON orders.orderID = orderItems.orderID JOIN products ON 
              orderItems.productID = products.productID WHERE orders.orderID='$var_value'", [], $conn);

$discountTotal = getOne("SELECT SUM(discountAmount) AS discount FROM orderitems WHERE orderID='$var_value'", [], $conn);

$orderTotal = getOne("SELECT (SUM(shipAmount) + SUM(taxAmount) + SUM(itemPrice)) AS total FROM orders JOIN orderItems ON
              orders.orderID = orderItems.orderID WHERE orders.orderID='$var_value'", [], $conn);
// Here you might connect to the database and show off some of your newest guitars.

?>
<!doctype html>
<html lang="en">
  <head>
  <?php include 'head.php';?>
  </head>
  <body>
    <div>
    <?php include 'menu.php';?>
    </div>
    <div class="container">
      <div class="row">
      <div class="col-md-4 offset-md-4">
            <h3>Detailed Order Info</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md order-md-1">
          <form>
            <h4 class="mb-3">Shipping Information</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="orderDate">Order Date:</label>
                <input type="text" class="form-control" id="orderDate" placeholder="" value="<?= $customerInfo['orderDate']; ?>">
              </div>
              <div class="col-md-6 mb-3">
                <label for="shippingDate">Date Shipped:</label>
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
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" placeholder="" value="<?= $customerInfo['city']; ?>">
              </div>
              <div class="col-md-4 mb-4">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" placeholder="" value="<?= $customerInfo['state']; ?>">
              </div>
              <div class="col-md-4 mb-4">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" value="<?= $customerInfo['zipCode']; ?>">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class"row">
        <div class="col-sm">
          <h4>Items Ordered:</h4>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Product Name</th>
              <th scope="col">Item Price</th>
              <th scope="col">Quantity</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ordersInfo as $orderInfo): ?>
              <tr>
                <!-- <th scope="row"><//?= $orderInfo['orderID']; ?></th> -->
                <td><?= $orderInfo['productName']; ?></td>
                <td><?= $orderInfo['quantity']; ?> </td>
                <td>$<?= $orderInfo['itemPrice']; ?> </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-md order-md-1">
          <form>
          <div class="row">
              <div class="col-md-3 mb-3">
                <label for="orderDiscount">Order Discount"</label>
                <input type="text" class="form-control" id="orderDiscount" placeholder="" value="$<?= $discountTotal['discount']; ?>">
              </div>
              <div class="col-md-3 mb-3">
                <label for="taxAmount">Tax:</label>
                <input type="text" class="form-control" id="taxAmount" placeholder="" value="$<?= $orderInfo['taxAmount']; ?>">
              </div>
              <div class="col-md-3 mb-3">
                <label for="taxAmount">Tax:</label>
                <input type="text" class="form-control" id="taxAmount" placeholder="" value="$<?= $orderInfo['taxAmount']; ?>">
              </div>
              <div class="col-md-3 mb-3">
                <label for="shippingAmount">Order Total:</label>
                <input type="text" class="form-control" id="orderTotal" placeholder="" value="$<?= $orderTotal['total']; ?>">
              </div>
            </div>
          </form>
        </div>
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