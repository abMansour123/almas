<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title> Add category </title>
</head>
<?php 
include '../../shared/config.php';
include '../../shared/sidebar.php';
include '../../shared/auth.php';

$update=false;

if (isset($_POST['send'])) {
  $name = $_POST['categoryName'];
  $type = $_POST['typeCat'];
  $insert = "INSERT INTO `subcat` VALUES (NULL,'$name','$type')";
  $i = mysqli_query($conn, $insert);
  header('location:categories.php');


}
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
  $query0 = "SELECT * FROM `subcat` WHERE id = $id";
  $res = mysqli_query($conn, $query0);
  $rows = mysqli_fetch_array($res);
  $edName = $rows['subname'];
  

if (isset($_POST['update'])) {
  $upName = $_POST['categoryName'];
  $upType = $_POST['typeCat'];
  $edit = "UPDATE `subcat` SET `subname`='$upName',`type`='$upType' WHERE `id`=$id";
  $update = mysqli_query($conn, $edit);
  if ($update) {
 header('location:categories.php');
  }
}
}

?>
<div class="container pt-5" style="text-align: center;">
<h1 style="color: #ef8354 ;" class="display-2"> Add a new category</h1>
</div>

<div class="container pt-5 col-2">
  <form method="POST">
    <div class="mb-3">
      <label for="categoryName" class="form-label fs-2">Category Name</label>
      <input type="text" name="categoryName" class="form-control" value="<?php if($update==true){echo $edName;}else{ echo'';} ?>" id="categoryName" placeholder="Please enter the category name"  required>
    </div>
    <label for="radio" class="form-label fs-2">It's type</label>
    <div id="radio">
      <input type="radio" class=" btn-check" name="typeCat" id="success-outlined" value="woman" checked>
      <label class="btn btn-outline-dark" for="success-outlined">Women</label>
      <input type="radio" class="btn-check" name="typeCat" id="danger-outlined" value="men">
      <label class="btn btn-outline-dark" for="danger-outlined">Men</label>
    </div>
  <?php if($update==false){ ?>
    <button type="submit" name="send" class=" mt-5 px-5 btn btn-secondary">ADD</button>
  <?php }else{ ?>
    <button type="submit" name="update" class=" mt-5 px-5 btn btn-secondary">Update</button>
  <?php } ?>
  </form>

</div>

<?php include '../../shared/script.php' ?>