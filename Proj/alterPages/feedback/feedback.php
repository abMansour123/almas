<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<?php

include '../../shared/navbar.php';
include '../../shared/config.php';
include '../../shared/authcust.php';
$custId = $_SESSION['id'];
if (isset($_POST['send'])) {
    $content = $_POST['content'];
    $prodId=$_POST['prodId'];
    $insert = "INSERT INTO `feedback` values (NULL , '$content' ,'$custId' , '$prodId' )";
    $i = mysqli_query($conn, $insert);
    if($i)
{
  ?>
  <div class='alert alert-success text-center'> Thank you!<br>
                          we will look at your feedback ASAP
                                    </div> 
                                    <?php 
header("Refresh:3; url=../../index.php");
}
    
}
?>
<div class="container">


    <P class="fs-1 fw-bold">Feedback Form</P>
<div class="container col-5 mt-5">
</div>
    <form method="POST">
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" type="text" class="form-control" id="content" row="3"></textarea>
        </div>
        <select name="prodId" class="form-select">
            <?php
            $query123 = "SELECT * FROM `product` ";
            $result123 = mysqli_query($conn, $query123);
            while ($row = mysqli_fetch_assoc($result123)) {
                echo "<option value='" . $row['id'] . "'>" . $row['id'] . "-" . $row['proName'] . "</option>";
            }
            ?>
  </select>
        <button type="submit" name="send" class="btn btn-secondary mt-5">Submit</button>
</div>


</form>
<?php
include '../../shared/script.php';
?>