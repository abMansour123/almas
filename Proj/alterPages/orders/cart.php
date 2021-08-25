<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> my cart </title>

</head>

<body>
    <?php
    $totprice = 0;
    include '../../shared/navbar.php';
    include '../../shared/config.php';
    include '../../shared/authcust.php';
    $custId = $_SESSION['id'];

    $select="SELECT* FROM `customer`WHERE cid='$custId'";
$run=mysqli_query($conn,$select);
$show=mysqli_fetch_array($run);
$address=$show['address'];
$phone=$show['phone'];
    if (isset($_POST['checkOut'])) {
        $orderad =$_POST['orderAddress'];
        $orderph =$_POST['orderPhone'];
        $select = "SELECT * FROM `cart` where custId='$custId'";
        $check = mysqli_query($conn, $select);
        $rows = mysqli_num_rows($check);
        $rows1 = $rows;
        $select1 = "SELECT * FROM `order` where custId ='$custId'";
        $check1 = mysqli_query($conn, $select1);
        $rowordid = mysqli_num_rows($check1);
        $rowordid++;
        while ($rows > 0) {
            $show = mysqli_fetch_array($check);

            $totalPrice = $show['price'];
            $prodQuan = $show['prodQuan'];
            $custId = $show['custId'];
            $prodId = $show['prodId'];
            $totprice = $_SESSION['totalprice'];
            $t= date("y-m-d h:i:s");
            $insert = "INSERT INTO `order` VALUES ( '$rowordid' , '$totalPrice' ,'$prodQuan' ,'$custId', '$prodId', '$totprice','$t','$orderad','$orderph')";
            $query = mysqli_query($conn, $insert);
            $del = "DELETE FROM `cart` WHERE custId=$custId";
            $qu = mysqli_query($conn, $del);
      
            $rows--;
            header('location:myorders.php');
           
        }
    }
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $prodSel="SELECT * FROM `cart` WHERE `id`='$id'";
        $proQuery=mysqli_query($conn,$prodSel);
        $show=mysqli_fetch_array($proQuery);
        $prodQuan = $show['prodQuan'];
        $prodId = $show['prodId'];
        $sel = "SELECT `prodQuantity` FROM `product` WHERE `id`='$prodId'";
        $querySelect = mysqli_query($conn, $sel);
        $row = mysqli_fetch_array($querySelect);    
        $prQuan = $row['prodQuantity'];
        $finalQuan = $prQuan + $prodQuan;
        $update = "UPDATE `product` SET `prodQuantity`='$finalQuan' WHERE `id`='$prodId'";
        $queryUp = mysqli_query($conn, $update);
        $delete = "DELETE FROM `cart` WHERE id=$id";
        mysqli_query($conn, $delete);
    }
    $select = "SELECT product.proName,cart.price,cart.prodQuan,cart.id 
    FROM `cart`
    INNER JOIN product ON cart.prodId=product.id 
    where custId='$custId'";
    $s = mysqli_query($conn, $select);
    ?>
    <head>
        <title>Cart</title>
    </head>
    <body>
        <form action="cart.php" method="post">
            <div class="container col-10 mt-5">
                <table class="table bg-light  table-hover">
                    <thead class="table-dark">
                        <th>id</th>
                        <th>name</th>
                        <th>total price</th>
                        <th>quantity</th>
                        <th>Action</th>
                    </thead>
                    <?php
                    $totprice = 0;
                    foreach ($s as $data) {
                    ?>
                        <tr>
                            <td> <?php echo $data['id']; ?> </td>
                            <td> <?php echo $data['proName']; ?> </td>
                            <td><?php echo $data['price']; ?></td>
                            <td><?php echo $data['prodQuan']; ?></td>
                            <td><a href="cart.php?delete=<?php echo $data['id']; ?>" class="btn btn-danger">Remove</a>
                                <?php
                                $totprice += $data['price'];
                                $_SESSION['totalprice'] = $totprice;
                                ?>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4" style="text-align:right;"> <b>Total Price : </b></td>
                        <td> <?php echo $totprice; ?></td>
                    </tr>

                    <div class="d-grid gap-2 col-3 mx-auto mt-5">
                        <button type="submit" class="btn btn-outline-success" name="checkOut">Check Out</button>
                    </div>
        <div class="container mt-5">
<div class="form-group">
<label for="orderAddress">Address</label>
<input class="form-control" name="orderAddress"  placeholder="Please enter your loctaion" id="Address" type="text" value="<?php echo$address;?>">

<label for="orderPhone">Phone</label>
<input class="form-control" name="orderPhone" type="text" placeholder="Please enter your phone number" id="Phone"  value="<?php echo$phone;?>"">

</div>

    </body>
</html>
<?php
include '../../shared/script.php';
?>