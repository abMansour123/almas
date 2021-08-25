<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title> Add category </title>
</head>
<?php 
include '../../shared/config.php';
include '../../shared/sidebar.php';
include '../../shared/auth.php';

if(isset($_GET['delete'])){

$id=$_GET['delete'];
$delete="DELETE FROM `subcat` WHERE id =$id";
$d=mysqli_query($conn,$delete);
if($d){

}
else {?>
  <script> alert(" The Category has products you must delete it first"); </script>
  <?php 
}
}
?>
<div class="container text-center pt-5">
    <h1 style="color: #ef8354 ;" class="display-2"> All the available categories</h1>
</div>

<div class="container col-9 pt-5" style=" float:right; margin-right:10%;">
<table class="table table-hover text-dark text-center">
<thead >
  <tr >
      <th colspan="4" scope="col" ><a href="./addCategory.php"  class="btn btn-outline-secondary btn-sm mx-"  style="float:right;"><i class="bi bi-person-plus"></i> Create a new category </a></th>
    </tr>
  </thead>
 

    <tr   style="color:white; background-color: 2d3142;" >
      <th class="p-3" scope="col"> ID </th>
      <th class="p-3" scope="col"> Name </th>
      <th class="p-3" scope="col"> Type </th>
      <th class="p-3" scope="col"> Action </th>
    </tr>
  
  <tbody>
  <?php
  $select = "SELECT * FROM  `subcat` ORDER BY `type` ASC";
  $q = mysqli_query($conn, $select);
  foreach($q as $data){
  ?>
    <tr style="background-color: bfc0c0;">
      <th><?php echo$data['id']; ?></th>
      <td><?php echo$data['subname']; ?></td>
      <td><?php echo$data['type']; ?></td>
      <td>
          <a href="./addcategory.php?edit=<?php echo $data['id']?>" name="update" class="btn btn-outline-success"><i class="bi bi-cloud-upload"></i> Update</a>
          <a href="./categories.php?delete=<?php echo $data['id']?>" name="delete" class="btn btn-outline-danger"><i class="bi bi-trash"></i> Delete</a>
    </td>
    </tr>
    <tr>
    <?php
  }
    ?>
  </tbody>
</table>
</div>

<?php include '../../shared/script.php' ?>