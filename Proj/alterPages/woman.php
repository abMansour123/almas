<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> woman </title>
    <link rel="stylesheet" href="../shared/style.css">
</head>
<?php
include '../shared/navbar.php';
include '../shared/config.php';
// include '../shared/authcust.php';
if (isset($_POST['buy'])) {
    if ($_SESSION['id']) {
        $prodId = $_POST['buy'];
        $show = "SELECT * FROM `product` WHERE `id`='$prodId' ";
        $zxc = mysqli_query($conn, $show);
        $row = mysqli_fetch_array($zxc);
        $prQuan = $row['prodQuantity'];
        $prodPrice = $row['price'];
        $prodQuan = $_POST['quan'];
        $sum = $prodPrice * $prodQuan;
        $custId = $_SESSION['id'];
        $finalQuan = $prQuan - $prodQuan;
        $update = "UPDATE `product` SET `prodQuantity`='$finalQuan' WHERE `id`='$prodId'";
        $queryUp = mysqli_query($conn, $update);
        $insert = "INSERT INTO `cart` VALUES ( NULL ,'$sum','$prodQuan','$custId','$prodId')";
        $query1 = mysqli_query($conn, $insert);


        header('location:orders/cart.php');
    } else {
        header('location:signin/signin.php');
    }
}
?>

<body>
    <form method="POST">
        <div class="container col2 mt-4" style="text-align:center;">
            <p class="fs-1 fw-bold info logo"> Women </p>
        </div>
        <div class="container align-center">
            <div class="card-header " style="background-color: #404e4d;">
                <ul class="nav nav-tabs card-header-tabs">
                    <?php
                    $select = "SELECT * FROM  `subcat` WHERE type = 'woman' ";
                    $q = mysqli_query($conn, $select);
                    ?>
                    <a href="./woman.php" name="category" class="nav-link text-light">ALL</a>
                    <?php
                    foreach ($q as $data) {
                    ?>
                        <li class="nav-item">
                            <a href="./woman.php?cat=<?php echo $data['id']; ?>" name="category" class="nav-link text-light"><?php echo $data['subname'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php
        $cat = '';
        if (isset($_GET['cat'])) {
            $cat = $_GET['cat'];
            $getting = "SELECT * FROM  `subcat` WHERE `id` = '$cat' ";
            $d = mysqli_query($conn, $getting);
        } else {
            $selectgdn = "SELECT  product.*,product.id AS prodId , subcat.*
            FROM (product
            INNER JOIN subcat ON product.categoryId=subcat.id)
            WHERE  subcat.type = 'woman' ";
            $q = mysqli_query($conn, $selectgdn);
        ?>
            <div class="container ">
                <div class="row row-cols-2 row-cols-md-4">
                    <?php
                    foreach ($q as $data) {
                    ?>
                        <div class="card m-5">

                            <img src="product/img/<?php echo $data['image'] ?>" class="card-img-top" height="400px" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title"> Product Name : <?php echo $data['proName'] ?> </h5>
                                <hr>
                                <p class="card-text"> Metal Purity : <?php echo $data['metalPurty'] ?> </p>
                                <p class="card-text"> Metal Color : <?php echo $data['metalColor'] ?> </p>
                                <p class="card-text"> Price : <?php echo $data['price'] ?> $ </p>
                                
                                <?php if($data['prodQuantity']<=10 && $data['prodQuantity']>0 ){  ?>
                                <p class="card-text"> Items Left : <?php echo $data['prodQuantity'] ?> </p>
                            <?php } ?>
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
                                        <button type="submit" name="buy" value="<?php echo $data['prodId']; ?>" class="btn btn-outline-secondary"><i class="bi bi-basket"></i>Cart it</button>
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
        <?php }
        $select = "SELECT * FROM  `product` WHERE `categoryId` = '$cat' ";
        $q = mysqli_query($conn, $select);
        ?>
        <div class="container ">
        <div class="row row-cols-2 row-cols-md-4">
                    <?php
                    foreach ($q as $data) {
                    ?>
                        <div class="card m-5">

                            <img src="product/img/<?php echo $data['image'] ?>" class="card-img-top" height="400px" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title"> Product Name : <?php echo $data['proName'] ?> </h5>
                                <hr>
                                <p class="card-text"> Metal Purity : <?php echo $data['metalPurty'] ?> </p>
                                <p class="card-text"> Metal Color : <?php echo $data['metalColor'] ?> </p>
                                <p class="card-text"> Price : <?php echo $data['price'] ?> $ </p>
                                
                                <?php if($data['prodQuantity']<=10 && $data['prodQuantity']>0 ){  ?>
                                <p class="card-text"> Items Left : <?php echo $data['prodQuantity'] ?> </p>
                            <?php } ?>
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
                                        <button type="submit" name="buy" value="<?php echo $data['prodId']; ?>" class="btn btn-outline-secondary"><i class="bi bi-basket"></i>Cart it</button>
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
        include '../shared/footer.php';
        include '../shared/script.php'; ?>
    </form>