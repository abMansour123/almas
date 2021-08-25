<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> Control Panel </title>
</head>
<?php 
include '../shared/sidebar.php';
include '../shared/config.php';
include '../shared/auth.php';


$select = "SELECT * FROM `employee` ";
$query = mysqli_query($conn, $select);
$employees = mysqli_num_rows($query);
$select = "SELECT * FROM `order` ";
$query = mysqli_query($conn, $select);
$order = mysqli_num_rows($query);
$select = "SELECT * FROM `feedback` ";
$query = mysqli_query($conn, $select);
$feedback = mysqli_num_rows($query);
$select = "SELECT * FROM `product` ";
$query = mysqli_query($conn, $select);
$product = mysqli_num_rows($query);
?>
<div class="container text-center pt-5">
    <h1 style="color: #ef8354 ;" class="display-2"> Welcome back</h1>
</div>
<div class="container text-center">
<div class="row">
<div class="col-sm-6 mt-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">the number of working employees</h5>
        <p class="card-text display-5"><?php echo $employees;?></p>
        <a href="/Proj/alterPages/employee/emlist.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 mt-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">the number of ongoing orders</h5>
        <p class="card-text display-5"><?php echo $order;?></p>
        <a href="/Proj/alterPages/orders/order.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 mt-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">the number of recived feedbacks</h5>
        <p class="card-text display-5"><?php echo $feedback;?></p>
        <a href="/Proj/alterPages/feedback/fbPage.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 mt-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">the number of available products</h5>
        <p class="card-text display-5"><?php echo $product;?></p>
        <a href="/Proj/alterPages/product/product.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
</div>
<?php 
include '../shared/script.php';
?>