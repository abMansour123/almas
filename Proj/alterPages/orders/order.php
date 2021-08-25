<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> Orders</title>
</head>
<?php
 include '../../shared/sidebar.php';
include '../../shared/config.php';
include '../../shared/auth.php';

?>
<div class="container text-center pt-5">
    <h1 style="color: #ef8354 ;" class="display-2"> List of Ongoing Orders</h1>
</div>
<div class="container col-9 pt-5" style=" float:right; margin-right:10%;">
<table class="table table-hover text-dark text-center">
<tr  style="color:white; background-color: 2d3142;" >
            <th class="p-3" > ID</th>
            <th class="p-3" > prod name</th>
            <th class="p-3" > price</th>
            <th class="p-3" > Time</th>
            <th class="p-3" > Expected Time to recieve</th>
            <th class="p-3" > Quantity</th>
            <th class="p-3" > total price</th>
        </tr>
        <?php
                  $select = "SELECT product.proName, product.price, product.prodQuantity, order.id, order.price, order.prodQuan,order.time
                  FROM `order`
                  INNER JOIN product ON order.prodId=product.id";

                  
        $s = mysqli_query($conn,$select) ; 
        
         foreach($s as $data) { 
            ?>
           
           <tr style="background-color: bfc0c0;">
                    <th> <?php echo $data['id'];?> </th>
                    <td> <?php echo $data['proName']; ?> </td>
                    <td> <?php echo $data['price']; ?> </td>
                    <td> <?php echo $data['time']; ?> </td>
                    <?php $date = $data['time'];
            $date = date('Y-m-d', strtotime($date . ' + 3 days'));
            ?>
                    <td> <?php echo $date ?> </td>
                    <td> <?php echo $data['prodQuan']; ?> </td>
                    <td> <?php $sum = $data['price'] * $data['prodQuan']; echo $sum; ?> </td>
            
        </tr>
        <?php } ?>
    </table>
</div>
<?php
 include '../../shared/script.php' ;
?>