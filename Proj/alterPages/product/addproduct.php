<html>
    
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title> Add Product </title>
        <style>
        label {
            margin-top: 10px;
        }
        </style>
    </head>
    <?php
include '../../shared/config.php';
include '../../shared/sidebar.php';
$update = false;
// session_start();
/// to insert into product database
if (isset($_POST['send'])) {
    $name = $_POST['proName'];
    $desc=$_POST['description'];
    $purity = $_POST['metalPurty'];
    $color = $_POST['metalColor'];
    $brand = $_POST['Brand'];
    $price = $_POST['price'];
    $quantity = $_POST['prodQuantity'];
    /// to input an image
    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $location = "img/";
    move_uploaded_file($imageTmp, $location . $imageName);
    $type=$_POST['gridRadios'];
    $section=$_SESSION['section'];
  if(isset($_SESSION['idAdmin'])){
      $adminId=$_SESSION['idAdmin'];
  }else{
      $adminId=$_POST['idAdmin'];
  }
    if($type=="Men"){
    $categoryId = $_POST['idCatMen'];
        
    $insert = "INSERT INTO `product`  
    (`id`, `proName`, `description`, `metalPurty`, `metalColor`, `Brand`, `price`, `image`, `adminId`, `categoryId`, `prodQuantity`)
    values (NULL , '$name','$desc','$purity','$color','$brand','$price','$imageName','$adminId','$categoryId','$quantity')";
    $i = mysqli_query($conn, $insert);
    if($i){
    header('location:product.php');
}else{
    echo"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
}
}else{
    $categoryId = $_POST['idCatwoMen'];
    $insert = "INSERT INTO `product`  
    (`id`, `proName`, `metalPurty`, `metalColor`, `Brand`, `price`, `image`, `adminId`, `categoryId`, `prodQuantity`)
    values (NULL , '$name','$purity','$color','$brand','$price','$imageName','$adminId','$categoryId','$quantity')";
    $i = mysqli_query($conn, $insert);
    if($i){
    header('location:product.php');
}
}
}
///update///
if (isset($_GET['update'])) {

    $id = $_GET['update'];
    $update = true;
    $select = "SELECT * FROM `product` Where id=$id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($s);
    $name  = $row['proName'];
    $desc  = $row['description'];
    $purty = $row['metalPurty']; //new
    $color = $row['metalColor']; //
    $brand = $row['Brand']; //
    $price = $row['price'];
    $image = $row['image'];
    $adminId2 = $row['adminId'];
    $categoryId2 = $row['categoryId'];
    $prodQuantity = $row['prodQuantity'];

    if (isset($_POST['update'])) {

        $name = $_POST['proName'];
        $desc=$_POST['description'];//men
        $purty = $_POST['metalPurty']; //women
        $color = $_POST['metalColor']; //women
        $brand = $_POST['Brand'];
        $price = $_POST['price'];
        $adminId2 = $_POST['idAdmin'];
        $prodQuantity = $_POST['prodQuantity'];
        if($type=="Men"){
            $catId = $_POST['idCatMen'];
        $update = "UPDATE `product` SET `proName`='$name',`description`='$desc',`Brand`='$brand',`price`= $price,`adminId`=$adminId2
        ,`categoryId`=$catId,`prodQuantity`=$prodQuantity ,`metalPurty`='',`metalColor`='' WHERE id=$id";
        $i = mysqli_query($conn, $update);
        if ($i) {
            header('location:product.php');
        }
    }else{
        $catId = $_POST['idCatwoMen'];
        $update = "UPDATE `product` SET `proName`='$name',`metalPurty`='$purty',`metalColor`='$color',`Brand`='$brand',`price`= $price,`adminId`=$adminId2
        ,`categoryId`=$catId,`prodQuantity`='$prodQuantity' ,`description`='$desc' WHERE id=$id";
                $i = mysqli_query($conn, $update);
                if ($i) {
                    header('location:product.php');
                }
    }
}
}
?>
<h1 class="text-center text-info display-2"> <?php if ($update == true) {echo "UPDATE";} else {echo "ADD";} ?> PRODUCT </h1>
<div class="container col-5 mt-5">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">

            <label for="name">Product Name</label>
            <input name="proName" value="<?php if ($update == true) {echo $name;} else {echo '';} ?>" type="text" class="form-control" id="name" placeholder="please enter the product Name" required>
            <div class="form-text">Example: Lace, ananya, ...</div>

            
            <label for="quantity">Product Quantity</label>
            <input name="prodQuantity" value="<?php if ($update == true) {echo $prodQuantity;} else { echo ''; } ?>" type="number" class="form-control" id="quntity" placeholder="please enter the product Quantity" required>
            <div class="form-text">Example: 1000, 50000, ...</div>
           
            <label for="price">Product Price</label>
            <input name="price" type="number" min="1" value="<?php if ($update == true) {echo $price;} else { echo ''; } ?>" class="form-control" id="price" placeholder="please enter the product price" required>
            <div class="form-text">Example: 50, 150, ...</div>
            
            <?php if ($update == false) {  ?>
                <label for="exampleInputEmail1">Product Photo</label>
                <input name="image" type="file" class="form-control" id="exampleInputEmail1" required>
                <div class="form-text">Insert photo for the product.</div>
            <?php } ?>

            <label style="display: block;" for="name">Product Type</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Men" onclick="Show()" checked>
                <label class="form-check-label" for="gridRadios1" style="margin-top: 0;" onclick="Show()">Men</label>
            </div>
            <div class="form-check form-check-inline" >
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="woMen" onclick="Show()">
                <label class="form-check-label" for="gridRadios2" style="margin-top: 0;" onclick="Show()">Women</label>
            </div>
            
            <div class="form-text">Choose the Type of the product.</div>
           

            <div id="Men">
                <label for="description">Product Description</label>
                <input name="description" value="<?php if ($update == true) {echo $desc;} else {echo ''; } ?>" type="text" class="form-control" id="description" placeholder="Please Enter The Product Description" required>
                <div class="form-text">Example : Genuine leather, chronoghraph stainless steel  ...</div>
                </select>
            
                 
                <label for="Brand">Product Brand</label>
            <input name="Brand" value="<?php if ($update == true) { echo $brand;} else { echo '';} ?>" type="text" class="form-control" id="brand" placeholder="please enter the brand" required>
            <div class="form-text">Example: Omega, Gucci, ...</div>
            
            <label for="inputGroupSelect01">Product Category</label>
            <select name="idCatMen" class="form-select" id="inputGroupSelect01" >
                <?php
                $select = "SELECT * FROM `subcat` WHERE type = 'men' ";
                $result = mysqli_query($conn, $select);
                foreach ($result as $row) {echo "<option value='" . $row['id'] . "'>" . $row['id'] . "-" . $row['subname'] . "</option>";}
                ?>
            </select>
       
            </div>
          
          
            <div id="woMen">
                <label for="metalPurty">Metal Purity</label>
                <input name="metalPurty" value="<?php if ($update == true) {echo $purty;} else {echo '';} ?>" type="text" class="form-control" id="purity" placeholder="Please Enter The Metal Purity" required>
                <div class="form-text">Example : 21k, 18k,  ...</div>

                <label for="metalColor">Metal Color</label>
                <input name="metalColor" value="<?php if ($update == true) {echo $color;} else {echo '';} ?>" type="text" id="color" class="form-control" placeholder="Please Enter The Metal Color" >
                <div class="form-text">Example : Black, Gold,  ...</div>

                <label for="inputGroupSelect01">Product Category</label>
                <select name="idCatwoMen" class="form-select" aria-label="Default select example" id="inputGroupSelect01">
                <?php
                $select = "SELECT * FROM `subcat` WHERE type = 'woman' ";
                $result = mysqli_query($conn, $select);
                foreach ($result as $row) {echo "<option value='" . $row['id'] . "'>" . $row['id'] . "-" . $row['subname'] . "</option>";}
                ?>
                
            </select>
            <div class="form-text"> Choose the Category of the product.</div>
            </div>
            <hr>
            <?php 
            if(!isset($_SESSION['idAdmin'])){
            ?>
            <label for="inputGroupSelect01">Admin</label>
            <select name="idAdmin" class="form-select" id="inputGroupSelect01">
                <?php
                $select = "SELECT * FROM `admin` ";
                $result = mysqli_query($conn, $select);
                foreach ($result as $row) { echo "<option value='" . $row['id'] . "'>" . $row['id'] . "-" . $row['adminName'] . "</option>";}
                ?>
            </select>
            <div class="form-text">Choose the name of the admin in charge of the shift. </div>
<?php } ?>
            <?php if ($update == false) { ?>
                <br> <button type="submit" name="send" class="btn btn-primary"> Done </button>
            <?php } else { ?>
                <br> <button type="submit" name="update" class="btn btn-primary"> Update </button>
            <?php } ?>
        </div>
    
    </form>
    <script>
        function Show() {

            var x = document.getElementById("Men");
            var y = document.getElementById("woMen");
            var purity = document.getElementById("purity");
            var color = document.getElementById("color");
            var desc = document.getElementById("description");
            var brand = document.getElementById("brand");
            if (document.getElementById("gridRadios1").checked) {
                
                if (x.style.display === "none") {
                    x.style.display = "block";
                    y.style.display = "none";
                    purity.removeAttribute("required");
                    color.removeAttribute("required");
                }
            } else {
                x.style.display = "none";
                y.style.display = "block";
                desc.removeAttribute("required");
                brand.removeAttribute("required");
                }

            if (document.getElementById("gridRadios2").checked) {
                if (y.style.display === "none") {
                    y.style.display = "block";
                    x.style.display = "none";
                    desc.removeAttribute("required");
                    brand.removeAttribute("required");
                }
            } else {
                y.style.display = "none";
                x.style.display = "block";
                purity.removeAttribute("required");
                color.removeAttribute("required");
                }
        }
        window.onload = Show();
    </script>