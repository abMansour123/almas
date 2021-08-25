<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> My Orders </title>
</head>

<body id="body">
    <?php
    include '../../shared/navbar.php';
    include '../../shared/config.php';
    include '../../shared/authcust.php';

    $customerId = $_SESSION['id'];
    ?>
    <div class="container col-10 mt-5">
    <table class="table bg-light  table-hover">
                <thead class="table-dark">
                <th>Order Id</th>
                <th>Time</th>
                <th>Total Price</th>
                <th>Deliverd To</th>
                <th>Phone</th>
                <th>Action</th>


            </thead>
            <?php
            $select = "SELECT * FROM `order`
            where order.custId='$customerId' GROUP BY order.id";
            $s = mysqli_query($conn, $select);

            foreach ($s as $data) {
            ?>
                <tr>
                    <td> <?php echo $data['id']; ?> </td>
                    <td> <?php echo $data['time']; ?> </td>
                    <td> <?php echo $data['totprice']; ?> </td>
                    <td> <?php echo $data['orderAd']; ?> </td>
                    <td> <?php echo $data['orderPhone']; ?> </td>
                    <td> <a href="./viewOrder.php?orid=<?php echo $data['id']?>" name="update" class="btn btn-outline-primary">View</a> </td>

                    

                         </tr>
                        <?php } ?>
        </table>
    </div>
    <?php
    include '../../shared/script.php';
    ?>