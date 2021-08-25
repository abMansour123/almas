<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title> Employees </title>
</head>
<?php include '../../shared/config.php';
include '../../shared/sidebar.php';
include '../../shared/auth.php';
$section=$_SESSION['section'];
if($section=="admin"){

//echo for emoplyee data in employee table
$select = "SELECT * FROM `employee`";
$s = mysqli_query($conn , $select);

//delete
if(isset($_GET['delete'])){
  $del = $_GET['delete'];
  $delete = " DELETE  FROM  `employee` WHERE id = $del";
  $d = mysqli_query($conn , $delete);
  header('location:emList.php');
}

//inner join for department
$join = "SELECT  department.depName , employee.empName , employee.salary , employee.depId , employee.id
FROM (employee
INNER JOIN department ON employee.depId=department.id)";
$j = mysqli_query($conn , $join);
?>
<div class="container text-center pt-5">
    <h1 style="color: #ef8354 ;" class="display-2"> List of working Eployees</h1>
</div>
<!--employee table-->
<div class="container col-9 pt-5" style=" float:right; margin-right:10%;">
<table class="table table-hover text-dark text-center">
<thead>
    <tr>
      <th colspan="5" scope="col" ><a href="./addemployee.php"  class="btn btn-outline-secondary btn-sm mx-"  style="float:right;"><i class="bi bi-person-plus"></i> Add a new employee</a></th>
    </tr>
  </thead>

  <tr  style="color:white; background-color: 2d3142;" >
      <th class="p-3" scope="col">ID</th>
      <th class="p-3" scope="col">Employee Name</th>
      <th class="p-3" scope="col">Salary</th>
      <th class="p-3" scope="col">Department</th>
      <th class="p-3" scope="col">Action</th>
    </tr>
  
  <!--echo for empolyee data in employee table-->
  <?php foreach($j as $data){?>
  <tbody>
  <tr style="background-color: bfc0c0;">
      <th > <?php echo $data['id'];?></th>
      <td > <?php echo $data['empName'];?></td>
      <td ><?php echo $data['salary'];?></td>
      <td ><?php echo $data['depName'];?></td>
      <td>
        <!--icon edit and delete-->
      <a href="./addemployee.php?edit=<?php echo $data['id'];?>" type="button" class="btn btn-outline-success"><i class="bi bi-cloud-upload"></i> Update </a>  
      <a href="./emList.php?delete=<?php echo $data['id'];?>" type="button" class="btn btn-outline-danger"><i class="bi bi-trash"></i> Delete </a>
      </td>
    </tr>
</tbody>
<?php } ?>
</table>
</div>
<?php } else{?>
  <script>
  alert('you are not an admin')
  </script>;
<?php include '../../shared/script.php'; }?>