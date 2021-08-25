<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title> My profile </title>
</head>

<body id="body">
  <?php
  include '../../shared/navbar.php';
  include '../../shared/config.php';
  include '../../shared/authcust.php';

  $cid = $_SESSION['id'];
  $select = "SELECT * FROM `customer` WHERE cid = $cid";
  $q = mysqli_query($conn, $select);
  ?>


  <div class="container">
    <div class="main-body">

      <?php foreach ($q as $data) { ?>

        <div class="row gutters-sm">
          <div class="col-md- mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="./headshot.png" alt="Admin" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4><?php echo $data['custName']; ?></h4>

                    <a href="./update.php?update=<?php echo $data['id']; ?>" class="btn btn-success">update my info</a>

                  </div>
                </div>
              </div>
            </div>
            <div class="card mt-3">

            </div>
          </div>

          <div class="col-md-">
            <div class="card mb-3">
              <div class="card-body">

                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary" style="text-align: right" ;>
                    <?php echo $data['email']; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-9 text-secondary" style="text-align: right" ;>
                    <?php echo $data['phone']; ?>
                  </div>
                </div>

                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary" style="text-align: right" ;>
                    <?php echo $data['address']; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php  } ?>
          <div class="row gutters-sm">
            <div class="col-sm-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">MY</i>orders</h6>

                  <table class="table bg-light  table-hover">
                    <thead class="table-dark">
                      <th>id</th>
                      <th>name</th>
                      <th>price</th>
                      <th>quantity</th>
                      <th>total price</th>
                    </thead>
                    <?php
                    $select = "SELECT product.proName,product.price,product.prodQuantity,order.id,order.price,order.prodQuan
                        FROM `order`
                        INNER JOIN product ON order.prodId=product.id 
                        where custId='$cid'";

                    $s = mysqli_query($conn, $select);
                    foreach ($s as $data) {
                      $sum = $data['price'] * $data['prodQuan'];
                    ?>
                      <tr>
                        <td> <?php echo $data['id']; ?> </td>
                        <td> <?php echo $data['proName']; ?> </td>
                        <td> <?php echo $data['price']; ?> </td>
                        <td> <?php echo $data['prodQuan']; ?> </td>
                        <td> <?php echo $sum; ?> </td>
                      </tr>
                    <?php } ?>
                  </table>



                </div>
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">MY</i> cart</h6>

                  <table class="table bg-light  table-hover">
                    <thead class="table-dark">
                      <th>id</th>
                      <th>name</th>
                      <th>total price</th>
                      <th>quantity</th>
                      <th>Action</th>
                    </thead>
                    <?php
                    $select = "SELECT product.proName,cart.price,cart.prodQuan,cart.id 
    FROM `cart`
    INNER JOIN product ON cart.prodId=product.id 
    where custId='$cid'";
                    $s = mysqli_query($conn, $select);
                    foreach ($s as $data) {
                    ?>
                      <tr>
                        <td> <?php echo $data['id']; ?> </td>
                        <td> <?php echo $data['proName']; ?> </td>
                        <td><?php echo $data['price']; ?></td>
                        <td><?php echo $data['prodQuan']; ?></td>
                        <td><a href="cart.php?delete=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>

                      </tr>
                    <?php } ?>
                  </table>



                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
  </div>

  <?php
  include '../../shared/footer.php';
  include '../../shared/script.php'; ?>