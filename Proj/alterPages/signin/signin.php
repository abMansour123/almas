<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>sign in</title>
</head>
<?php
include '../../shared/navbar.php';
include '../../shared/config.php';
$_SESSION['section']="";

if (isset($_POST['signup'])) {
  header('location:signup.php');
}

if (isset($_POST['send'])) {
  $userName = $_POST['email'];
  $password = $_POST['password'];
  $select = " SELECT * FROM `admin` WHERE email = '$userName' AND password = '$password'  ";
  $s = mysqli_query($conn, $select);
  $row = mysqli_num_rows($s);
  $fetch = mysqli_fetch_array($s);
  if($fetch){

  $adminId = $fetch['id'];
  $adminName=$fetch['adminName'];
  if ($row > 0) {
    $_SESSION['section'] = "admin";
    $_SESSION['idAdmin'] = $adminId;
    header('location:../controlPanel.php');
  }
  } else {

    $select1 = "SELECT * FROM `employee` WHERE empEmail = '$userName' AND empPass = '$password'";
    $query1 = mysqli_query($conn, $select1);
    $row1 = mysqli_num_rows($query1);
    $fetch = mysqli_fetch_array($query1);
    $employeeId = isset($fetch['id']);

    if ($row1 > 0) {
      $_SESSION['section'] = "employee";
      $_SESSION['id'] = $employeeId;
      header('location:../controlPanel.php');
    } else {
     
      $select2 = "SELECT * FROM `customer` WHERE email = '$userName' AND custPassword = '$password'";
      $query2 = mysqli_query($conn, $select2);
      $row2 = mysqli_num_rows($query2);
      $fetch = mysqli_fetch_array($query2);
      if ($fetch) {
        $custId = $fetch['cid'];
        if ($row2 > 0) {
          $_SESSION['section'] = "customer";
          $_SESSION['id'] = $custId;
          header('location:/Proj/index.php');
        } else {
          session_unset();
          session_destroy();
          
        }
      }
    }
  }
?>
  <script>
    alert('Maybe your email or password are wrong')
  </script>;<?php } ?>

  <body>
    <div class="container col-4 mt-5">
      <form method="post">
        <div class="form-group my-3">
          <label for="exampleInputemaill" class="form-label fs-3 fw-bold">Email</label>
          <input type="email" class="form-control py-3" name="email" id="exampleInputname" placeholder="Please enter your Email">
        </div>
        <div class="form-group my-3">
          <label for="exampleInputPassword1" class="form-label fs-3 fw-bold">Password</label>
          <input type="password" class="form-control py-3" id="exampleInputPassword1" name="password" placeholder="Please enter your password">
        </div>
        <div class="d-grid gap-2 col-6 mx-auto mt-5">
          <button type="submit" class="btn btn-secondary" name="send">Sign in</button>
          <button type="submit" class="btn btn-link" name="signup">Don't Have Account ?</button>

        </div>

      </form>
    </div>

    <?php
    include '../../shared/script.php';
    ?>