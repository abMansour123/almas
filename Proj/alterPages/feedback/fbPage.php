<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Feedbacks</title>
</head>
<body>
<div class="container pt-5" style="text-align: center;">
    <h1 style="color: #ef8354 ;" class="display-2"> Feedbacks from the customers </h1>
    </div>
    
<?php 
include '../../shared/config.php';
include '../../shared/sidebar.php';
include '../../shared/auth.php';

//inner join 
$select = "SELECT feedback.id , customer.custName,feedback.custId,feedback.content,product.proName
FROM ((feedback
INNER JOIN customer ON feedback.custId=customer.cid)
INNER JOIN product ON feedback.prodId=product.id)";
$s = mysqli_query($conn, $select);


//delete feedback
if(isset($_GET['delete'])){
    $del = $_GET['delete'];
    $delete = " DELETE  FROM  `feedback` WHERE id = $del";
    $d = mysqli_query($conn , $delete);
header('location:fbPage.php');}

//feedback card
  foreach ($s as $data) {
?>
 
  <div class="container col-9 my-5">
    <div class="card m-3 " style="color: #f5f5f5 ; background-color: #141515;  width: 18rem;  float:left;">
      <div class="card-body my-3">
        <p class="fs-3 card-title">By : <span style="color:#ca5310 ;"><?php echo $data['custName']; ?> </span></p>
        <p class="card-subtitle mb-2 text-muted">About : <?php echo $data['proName']; ?><hr></p>
        <p class="card-text"><?php echo $data['content']; ?> </p>
        <a href="./fbPage.php?delete=<?php echo $data['id'];?>" class="btn btn-outline-success card-link">✓ done</a></span>
      </div>
    </div>
  </div>
<?php }
include '../../shared/script.php' ?>