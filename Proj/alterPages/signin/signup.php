<html>
 <head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>sign up</title>
</head>

<?php 

include '../../shared/navbar.php';

include '../../shared/config.php';
if(isset($_POST['signin'])){
  header('location:signin.php');
}

if (isset($_POST['send'])) {
    $name = $_POST['username'];
    $password = $_POST['custPassword'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $secure = "SELECT * FROM customer WHERE email = '$email'";
    $d = mysqli_query($conn ,$secure);
    $r = mysqli_num_rows($d);
    
    if($r > 0){?>
      <script>
    alert('email already exit')
  </script> <?php }
      else{

    $insert = "INSERT INTO `customer` VALUES (NULL,'$name','$password','$address','$email','$phone')";
    $i = mysqli_query($conn, $insert);
  }}
?>
<div class="container col-4 mt-5">
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-4">Name</label>
    <input type="text" class="form-control py-3" name="username" id="exampleInputEmail1" placeholder="Please enter your Name"  required> 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-4">Phone</label>
    <input type="number" class="form-control py-3"  name="phone" id="exampleInputEmail1" placeholder="Please enter your phone Number"  required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-4">Email</label>
    <input type="email" class="form-control py-3"  name="email" id="exampleInputEmail1" placeholder="Please enter your Email"  required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-4">Password</label>
    <input type="password" class="form-control py-3"  name="custPassword" id="exampleInputEmail1" placeholder="Please enter your password"  required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fs-4">address</label>
    <input type="text" class="form-control py-3"  name="address" id="exampleInputEmail1" placeholder="Please enter your Full Address"  required>
  </div>
<div class="d-grid gap-2 col-6 mx-auto mt-5">
  <button type="submit" name="send" class="btn btn-secondary"> Sign up</button>
  </div>
</form>
<form method="POST">
<div class="d-grid gap-2 col-6 mx-auto">
<button type="submit" class="btn btn-link" name="signin">Already Have Account ?</button>
</div>
</form>
</div>
<?php
include '../../shared/script.php';
?>