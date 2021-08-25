<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> Search </title>
</head>
<?php
include '../../shared/navbar.php';
include '../../shared/config.php';
include '../../shared/authcust.php';

if (isset($_POST['buy'])) {
    $prodId = $_POST['buy'];
    $show = "SELECT * FROM `product` WHERE `id`='$prodId' ";
    $zxc = mysqli_query($conn, $show);
    $row = mysqli_fetch_array($zxc);
    $prodPrice = $row['price'];
    $prodQuan = $_POST['quan'];
    $sum = $prodPrice * $prodQuan;
    $custId = $_SESSION['id'];
    $insert = "INSERT INTO `cart` VALUES ( NULL ,'$sum','$prodQuan','$custId','$prodId')";
    $query1 = mysqli_query($conn, $insert);
    header('location:/3DosProj/alterPages/orders/cart.php');
}
if (isset($_POST['submit-search'])) {
    if (isset($_POST['data'])) {
        $search = $_POST['data'];
        $select = "SELECT product.*,subcat.* , product.id AS productId FROM  product JOIN subcat ON product.categoryId=subcat.id 
    WHERE proName  
    LIKE '%$search%'
    ";
        $q = mysqli_query($conn, $select);
        $row = mysqli_num_rows($q);
    }
?>
    <div class="container">
        <?php ?>
        <div class="row row-cols-2 row-cols-md-4">
            <?php
            foreach ($q as $data) {
            ?>
                <div class="card m-5">

                    <img src="/3DosProj/alterPages/product/img/<?php echo $data['image'] ?>" class="card-img-top" height="400px" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title"> Product Name : <?php echo $data['proName'] ?> </h5>
                        <hr>
                        <p class="card-text">Price : <?php echo $data['price'] ?> $ </p>
                        <p class="card-text"><?php $type = $data['type'];
                                                if ($type == "men") {
                                                    echo "Brand Name : \" " . $data['Brand'];
                                                } else {
                                                    echo "Metal Purity : \" " . $data['metalPurty'];
                                                }  ?> "</p>

                                                      <p class="card-text"><?php $type = $data['type'];
                                                if ($type == "men") {
                                                    echo "Descripition : \" " . $data['description'];
                                                } else {
                                                    echo "Metal Color : \" " . $data['metalColor'];
                                                }  ?> "</p>
                    </div>
                    <form method="POST">
                        <div class="card-footer ">
                            <?php if ($data['prodQuantity'] > 0) { ?>
                                <div class="row">
                                    <div class="col-8">
                                        <label for="quan">Quantity</label>
                                        <input type="number" name="quan" class="form-control " min="1" max="<?php echo $data['prodQuantity'];  ?>" width="200px" id="quan" required>
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="buy" value="<?php echo $data['productId']; ?>" class="btn btn-outline-secondary"><i class="bi bi-basket"></i>Cart it</button>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <button type="disable" class="btn btn-outline-danger" disabled>Ø OUT OF STOCK</button>
                            <?php } ?>
                        </div>
                    </form>

                </div>
            <?php } ?>
        </div>
    </div>
<?php
} else { ?>
    <div class='alert alert-success text-center'> Unfortunately, We still don't have this product Yet.
                         
                                    </div> 
                                    <?php 
header("Refresh:3; url=../../index.php");
}

?>
<?php include '../../shared/script.php'; ?>