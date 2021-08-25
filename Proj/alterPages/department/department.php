<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title> Employees </title>
</head>
<?php
include '../../shared/config.php';
include '../../shared/sidebar.php';
include '../../shared/auth.php';
$select = "SELECT * FROM `department`";
$section=$_SESSION['section'];
if($section=="admin"){
$a = mysqli_query($conn, $select)
?>
<div class="container pt-5" style="text-align: center;">
    <h1 style="color: #ef8354 ;" class="display-2"> All the company departments </h1>
    </div>
    
<div class="container col-9 pt-5" style=" float:right; margin-right:10%;">
<table class="table table-hover text-dark text-center">
    <thead>
      <th class="mt-3" scope="col"></th>
      <th class="mt-3" scope="col"></th>

      <th scope="col"><a href="./addDepartment.php" class="btn btn-outline-secondary btn-sm mx-" style="float:right;"><i class="bi bi-person-plus"></i> Add a new Department</a></th>
      </tr>
    </thead>
    <tbody>
    <tr  style="color:white; background-color: 2d3142;" >
        <th class="py-3" scope="col"> ID </th>
        <th class="py-3" scope="col"> Department Name </th>
        <th class="py-3" scope="col"> Action </th>
      </tr>
      <?php
      foreach ($a as $data) {
      ?>
    <tr style="background-color: bfc0c0;">
          <th> <?php echo $data['id'] ?> </th>
          <td> <?php echo $data['depName'] ?> </td>
          <td> <a href="./addDepartment.php?edit=<?php echo $data['id'];?>" type="button" class="btn btn-outline-success"><i class="bi bi-cloud-upload"></i> Update </a>  
      <a href="./department.php?delete=<?php echo $data['id'];?>" type="button" class="btn btn-outline-danger"><i class="bi bi-trash"></i> Delete </a></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

<?php } else{?>
  <script>
  alert('you are not an admin')
  </script>;
<?php
include '../../shared/script.php'; }?>