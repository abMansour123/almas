<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> Add category </title>
</head>
<?php

include '../../shared/config.php';
include '../../shared/sidebar.php';
$select = " SELECT * FROM `product`";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `product` WHERE id=$id";
    mysqli_query($conn, $delete);
}
?>
<div class="container  text-center pt-5">
    <h1 style="color: #ef8354 ;" class="display-2"> List of available products</h1>
</div>
<div class="container col-10 pt-5" style=" float:right; margin-right:10%;">

<!-- MEN's Table -->

<div class="container  text-center pt-5">
    <h5 class="display-4"> Men's Products</h5>
</div>

<table class="table table-hover text-dark text-center"> 
<thead>
            <tr>
                <th colspan="9" scope="col"><a href="./addproduct.php" class="btn btn-outline-secondary btn-sm mx-" style="float:right;"> <i class="bi bi-person-plus"></i> Add product</a></th>
            </tr>
        </thead>
        <tr  style="color:white; background-color: 2d3142;" >
            <th class="p-3">ID</th>
            <th class="p-3">Name</th>
            <th class="p-3" >description</th>
            <th class="p-3">brand</th>
            <th class="p-3">Image</th>
            <th class="p-3">Added by</th>
            <th class="p-3">Quantity</th>
            <th class="p-3">Category</th>
            <th class="p-3">Action</th>
        </tr>
        <?php
        $selectt = " SELECT product.id as proid, product.* ,  admin.* , product.*  , subcat.*
        from((product
        JOIN admin ON product.adminId=admin.id)
        JOIN subcat ON product.categoryId=subcat.id)
        WHERE subcat.type = 'men'";
        $q = mysqli_query($conn , $selectt);
        
        foreach ($q as $data) {
        ?>
  <tr style="background-color: bfc0c0;">
                <th> <?php echo $data['id']; ?> </th>
                <td> <?php echo $data['proName']; ?> </td>
                <td style="width: 40px;"> <?php echo $data['description']; ?> </td>
                <td> <?php echo $data['Brand']; ?> </td>
                <td> <img width="80" src="img/<?php echo $data['image']; ?>"> </td>
                <td> <?php echo $data['adminName']; ?></td>
                <td> <?php echo $data['prodQuantity']; ?></td>
                <td> <?php echo $data['subname']; ?> </td>
                <td> <a href="./addproduct.php?update=<?php echo $data['proid']; ?>" class="btn btn-outline-success"> <i class="bi bi-cloud-upload"></i>Update </a>
                    <a href=" ./product.php?delete=<?php echo  $data['proid']; ?>" class="btn btn-outline-danger"> <i class="bi bi-trash"></i> Delete </a>
                </td>
            </tr>
        <?php } ?>
    </table>


    <!-- Women's Table -->

    <div class="container  text-center pt-5">
    <h4 class="display-4"> Women's Products</h4>
</div>

    
    <table class="table table-hover text-dark text-center">

        <tr  style="color:white; background-color: 2d3142;" >
            <th class="p-3">ID</th>
            <th class="p-3">name</th>
            <th class="p-3">metal purity</th>
            <th class="p-3">metal color</th>
            <th class="p-3">Image</th>
            <th class="p-3">Added by</th>
            <th class="p-3">Quantity</th>
            <th class="p-3">Category</th>
            <th class="p-3">Action</th>
        </tr>
        <?php
        $select = " SELECT product.id ,  admin.adminName , product.adminId , product.proName,  product.metalPurty, product.metalColor, product.price, product.image, product.prodQuantity , subcat.subname , subcat.type
        from((product
         JOIN admin ON product.adminId=admin.id)
         JOIN subcat ON product.categoryId=subcat.id)
        WHERE subcat.type = 'woman'";
        $q = mysqli_query($conn , $select);
        
        foreach ($q as $data) {
        ?>
  <tr style="background-color: bfc0c0;">
                <th> <?php echo $data['id']; ?> </th>
                <td> <?php echo $data['proName']; ?> </td>
                <td> <?php echo $data['metalPurty']; ?> </td>
                <td> <?php echo $data['metalColor']; ?> </td>
                <td> <img width="80" src="img/<?php echo $data['image']; ?>"> </td>
                <td> <?php echo $data['adminName']; ?></td>
                <td> <?php echo $data['prodQuantity']; ?></td>
                <td> <?php echo $data['subname']; ?> </td>
                <td> <a href="./addproduct.php?update=<?php echo $data['id']; ?>" class="btn btn-outline-success"> <i class="bi bi-cloud-upload"></i> Update </a>
                    <a href=" ./product.php?delete=<?php echo  $data['id']; ?>" class="btn btn-outline-danger"> <i class="bi bi-trash"></i> Delete </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<?php
include '../../shared/script.php';
?>