<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> View order </title>
</head>

<body>
    <?php
    include '../../shared/navbar.php';
    include '../../shared/config.php';
    include '../../shared/authcust.php';
    $custId = $_SESSION['id'];
    if (isset($_GET['orid'])) {
        $id = $_GET['orid'];
        $_SESSION['orid'] = $id;
        $query = "SELECT * FROM `order` WHERE id = $id";
        $res = mysqli_query($conn, $query);

        $id = $_SESSION['orid'];
        $select = "SELECT product.proName, product.price, product.prodQuantity,product.image, order.id, order.price, order.prodQuan
    FROM `order`
    JOIN product ON order.prodId=product.id
    WHERE  order.id = $id  ";
        $s = mysqli_query($conn, $select);
    }
    ?>
    <div class="container text-center mt-5 ">
        <h1 style="display:inline-block;" class="display-3">Order number <?php echo $id ?></h1>
        </div>
        <div class="d-flex justify-content-around"">
        <div style=" width:60%; display: inline-block; margin: 25px 100px;" class="container">
            <h2>products inside order number <?php echo $id ?> </h2>
            <?php
            foreach ($s as $data) {
            ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/3DosProj/alterPages/product/img/<?php echo $data['image'] ?>" width="175" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['proName']; ?></h5>
                                <p class="card-text">Ordered <?php echo $data['prodQuan']; ?> from this product. </p>
                                <p class="card-text"><small class="text-muted">With a total price of <?php echo $data['price']; ?>. </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div style="margin: 5% 5% 0 0; padding:2% 5%; background-color:white ; width: 40%; height: 100%; ">
            <hr>
            <hr>
            <h1 class=" display-5 text-center"> Your Recipt</h1>
            <hr>
            <?php $showcust = "SELECT customer.* , order.orderAd , order.custId , order.totprice , order.time FROM `customer`
            JOIN `order`
            ON order.custId = customer.cid   
            WHERE cid = $custId and order.id = $id";
            $m = mysqli_query($conn, $showcust);
            $row = mysqli_fetch_assoc($m);
            ?>
            <h4> Clinet name : <small> <?php echo $row['custName']; ?></small> </h4>
            <h4> Will be shipped to : <small> <br><?php echo $row['orderAd']; ?></small> </h4>
            <h4> Total Price : <small> <br><?php echo $row['totprice']; ?></small> </h4>
            <h4> ordered In : <small> <br><?php echo $row['time']; ?></small> </h4>
            <?php $date = $row['time'];
            $date = date('Y-m-d', strtotime($date . ' + 3 days'));
            ?>
            <h4> expected to be deliverd in : <small> <br><?php echo $date ?></small> </h4>
            <hr>
            <p class="text-center"><small> feel free to retrive your money before 14 days of this transaction </small></p>
            <hr>
            <hr>
        </div>
   
    <?php
    include '../../shared/script.php';
    ?>