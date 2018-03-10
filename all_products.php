<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
require_once('./includes/init.php');
require_once('./includes/db.php');
// Here you might connect to the database and show off some of your newest guitars.
$guitars = getMany("SELECT * FROM products JOIN categories ON products.categoryID = categories.categoryID", [], $conn);
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
                <div class="col-sm">
                    <h1>All Products</h1>
                </div>
            </div>
            <div class"row">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product Category</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($guitars as $guitar): ?>
                            <tr>
                                <th scope="row"><?= $guitar['categoryName']; ?></th>
                                <td><?= $guitar['productCode']; ?></td>
                                <td><?= $guitar['listPrice']; ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $guitar['productCode']; ?>">
                                        View More
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal<?= $guitar['productCode']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLongTitle<?= $guitar['productCode']; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLongTitle<?= $guitar['productCode']; ?>"><?= $guitar['productName']; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Category: <?= $guitar['categoryName']; ?>
                                            <p>Product Code: <?= $guitar['productCode']; ?>
                                            <p>Description: <?= $guitar['description']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <div>
        <?php include 'footer.php';?>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
