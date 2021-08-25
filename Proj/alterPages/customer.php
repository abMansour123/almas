<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title> list of customers</title>
</head>
<?php 
include '../shared/config.php';
include '../shared/sidebar.php';
include '../shared/auth.php';


?>

<div class="container pt-5" style="text-align: center;">
    <h1 style="color: #ef8354 ;" class="display-2"> list of customer </h1>
    </div>
    
<div class="container col-9 pt-5" style=" float:right; margin-right:10%;">
<table class="table table-hover text-dark text-center">
     
    <tbody>
    <tr  style="color:white; background-color: 2d3142;" >
        <th class="py-3" scope="col"> ID </th>
        <th class="py-3" scope="col"> Name</th>
        <th class="py-3" scope="col"> email</th>
        <th class="py-3" scope="col"> address</th>
        <th class="py-3" scope="col"> phone</th>

      </tr>
     <?php
      $select = "SELECT * FROM `customer`";
      $q = mysqli_query($conn , $select);
      foreach ($q as $data) {
      ?>
    <tr style="background-color: bfc0c0;">
          <th> <?php echo $data['cid'] ?> </th>
          <td> <?php echo $data['custName'] ?> </td>
          <td> <?php echo $data['email'] ?> </td>
          <td> <?php echo $data['address'] ?> </td>
          <td> <?php echo $data['phone'] ?> </td>
          
        </tr>
       <?php
      }
      ?>
    </tbody>
   
  </table>
</div>


<?php include '../shared/script.php';  ?>