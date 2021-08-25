<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title> Employees </title>
</head>
<?php
include '../../shared/config.php';
include '../../shared/sidebar.php';
include '../../shared/auth.php';
$update=false;
if(isset($_POST['send'])){
  $depname =$_POST['depName'];
  $insert="INSERT INTO `department` VALUES (NULL,'$depname')";
  $n = mysqli_query($conn,$insert);
header('location:./department.php');
}
if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update =true;
  $select = "SELECT * FROM `department` WHERE id = $id";
  $up = mysqli_query($conn, $select);
  $row = mysqli_fetch_array($up);
  $upName =$row['depName'];
  
  if(isset($_POST['update'])){
    $newName = $_POST['depName'];
    $new =" UPDATE 'department' SET `depName` = '$newName' ";
    $update =mysqli_query($conn, $new);
    if($update){
      header('location:./department.php');
    }
    }
}
?>
<div class="container pt-5" style="text-align: center;">
    <h1 style="color: #ef8354 ;" class="display-2"> Add Department Data </h1>
    </div>
    <div class="container pt-5 col-2">

<form method="POST"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Department name</label>
    <input type="text" name="depName" class="form-control" placeholder="Department Name" required>
   </div>
   <?php if($update==false){ ?>
  <button type="submit" name="send" class="btn btn-secondary btn-block ">Add</button>
   <?php  }else{ ?>
  <button type="submit" name="update" class="btn btn-secondary btn-block ">Update</button>
   <?php } ?>
</form>
</div>
    <?php 
include '../../shared/script.php';
?>