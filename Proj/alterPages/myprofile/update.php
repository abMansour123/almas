<html>
 <head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>sign up</title>
</head>
<?php 

include '../../shared/navbar.php';
include '../../shared/config.php';
if(isset($_GET['update'])){
    $id = $_GET['update']; 
 $select = "SELECT * FROM `customer` WHERE id= $id";
  $s = mysqli_query($conn , $select);
  $row = mysqli_fetch_assoc($s);
 $name =  $row['custName'];
 $password = $row['custPassword'];
 $address = $row['address'];
 $email = $row['email'];
 $phone = $row['phone'];}
 
 if(isset($_POST['edit'])){
  $name = $_POST['username'];
  $pass = $_POST['custPassword']; 
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $secur = "SELECT * FROM customer WHERE email = '$email'";
    $d = mysqli_query($conn ,$secur);
    $r = mysqli_num_rows($d);
    
    if($r > 1){?>
      <script>
    alert('email already exit')
  </script>; <?php }
      else{
  
$upadte = "UPDATE `customer` SET custName = '$name' , custPassword = '$pass' , address = '$address' , email = '$email' , phone = $phone where id = $id";
$f= mysqli_query($conn , $upadte);
header('location:profile.php');}}
?>
<div class="container col-4 mt-5">
<form method="post">
  <div class="mb-3">
    <label  for="exampleInputEmail1" class="form-label fs-4">Name</label>
    <input type="text" value="<?php echo $name ?>" class="form-control py-3" name="username" id="exampleInputEmail1" placeholder="Please enter your Name"  required> 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-4">Phone</label>
    <input type="number" value="<?php echo $phone ?>" class="form-control py-3"  name="phone" id="exampleInputEmail1" placeholder="Please enter your phone Number"  required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-4">Email</label>
    <input type="email" value="<?php echo $email ?>" class="form-control py-3"  name="email" id="exampleInputEmail1" placeholder="Please enter your Email"  required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-4">Password</label>
    <input type="password" class="form-control py-3"  name="custPassword" id="exampleInputEmail1" placeholder="Please enter your password"  required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-4">address</label>
    <input type="text" value="<?php echo $address ?>"class="form-control py-3"  name="address" id="exampleInputEmail1" placeholder="Please enter your Full Address"  required>
  </div>
<div class="d-grid gap-2 col-6 mx-auto mt-5">
  <button type="submit" name="edit" class="btn btn-secondary">edit</button>
  </div>
</form>

</div>
<?php
include '../../shared/script.php';
?>