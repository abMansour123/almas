<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> Man </title>

    <link rel="stylesheet" href="../shared/style.css">
</head>
<?php
include '../shared/navbar.php';
include '../shared/config.php';
include '../shared/authcust.php';
if (isset($_POST['buy'])) {
    $prodId = $_POST['buy'];
    $show = "SELECT * FROM `product` WHERE `id`='$prodId' ";
    $zxc = mysqli_query($conn, $show);
    $row = mysqli_fetch_array($zxc);
    $prodPrice = $row['price'];
    echo $prodPrice;
    $prodQuan = $_POST['quan'];
    $sum = $prodPrice * $prodQuan;
    $custId = $_SESSION['id'];
    $insert = "INSERT INTO `cart` VALUES ( NULL ,'$sum','$prodQuan','$custId','$prodId')";
    $query1 = mysqli_query($conn, $insert);
    header('location:orders/cart.php');
}
?>

<body>
    <form method="POST">
        <div class="container col2 mt-4" style="text-align:center;">
            <p class="fs-1 fw-bold info logo"> Man </p>
        </div>
        <div class="container align-center">
            <div class="card-header " style="background-color: #404e4d;">
                <ul class="nav nav-tabs card-header-tabs">
                    <?php
                    $select = "SELECT * FROM  `subcat` WHERE type = 'man' ";
                    $q = mysqli_query($conn, $select);
                    ?>
                    <a href="./man.php" name="category" class="nav-link text-light">ALL</a>
                    <?php
                    foreach ($q as $data) {
                    ?>
                        <li class="nav-item">
                            <a href="./man.php?cat=<?php echo $data['id']; ?>" name="category" class="nav-link text-light"><?php echo $data['subname'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php
        $cat = '';
        if (isset($_GET['cat'])) {
            $cat = $_GET['cat'];
            $getting = "SELECT * FROM `subcat` WHERE `id` = '$cat' ";
            $d = mysqli_query($conn, $getting);
        } else {
            $selectgdn = "SELECT  product.* ,product.id AS prodId , subcat.*
            FROM (product
            INNER JOIN subcat ON product.categoryId=subcat.id)
            WHERE  subcat.type = 'men' ";
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
                                <p class="card-text"> Description : " <?php echo $data['description'] ?> "</p>
                                <p class="card-text"> Brand : " <?php echo $data['Brand'] ?> "</p>
                                <p class="card-text"> Price : <?php echo $data['price'] ?> $ </p>
                                <p class="card-text"> Items Left : <?php echo $data['prodQuantity'] ?> </p>
                            </div>
                            <form method="POST">
                                <div class="card-footer">
                                    <?php if ($data['prodQuantity'] > 0) { ?>
                                        <input type="number" name="quan" class="form-control" placeholder="Please enter the Quantity" min="1" max="<?php echo $data['prodQuantity'];  ?>" width="200px">
                                        <button type="submit" name="buy" value="<?php echo $data['prodId']; ?>" class="btn btn-outline-secondary"><i class="bi bi-basket"></i>Cart it</button>
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
                        <img src="product/<?php echo $data['image'] ?>" class="card-img-top" height="400px" alt="Product">
                        <div class="card-body">
                            <h5 class="card-title"> Instrument name : <?php echo $data['proName'] ?> </h5>
                            <hr>
                            <p class="card-text"> Summary : " <?php echo $data['description'] ?> "</p>
                            <p class="card-text"> Price : <?php echo $data['price'] ?> $ </p>
                        </div>
                        <form method="POST">
                            <div class="card-footer">
                                <input type="number" name="quan" class="form-control" placeholder="Please enter the Quantity" min=1 max=10>
                            </div>
                        </form>
                        <div class="card-footer">
                            <button type="submit" name="buy" value="<?php echo $data['id'] ?>" class="btn btn-outline-secondary"><i class="bi bi-basket"></i> Cart it</button>
                        </div>

                    <?php } ?>
                    </div>
            </div>
        </div>
        <?php
        include '../shared/footer.php';
        include '../shared/script.php' ?>
    </form>