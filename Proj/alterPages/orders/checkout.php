<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Check Out </title>
</head>
<?php
include '../../shared/navbar.php';
include '../../shared/config.php';
include '../../shared/authcust.php';
$custId = $_SESSION['id'];
$select="SELECT* FROM `customer`WHERE cid='$custId'";
$run=mysqli_query($conn,$select);
$show=mysqli_fetch_array($run);
$address=$show['address'];
$phone=$show['phone'];
?>
<body>
<div class="container mt-5">
<form action="checkout.php" method="post">
<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
  <input type="radio" onclick="show()"  class="btn-check" value="de" name="btnradio" id="btnradio1" autocomplete="off" checked>
  <label class="btn btn-outline-light" for="btnradio1">default</label>

  <input type="radio"  onclick="show()" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
  <label class="btn btn-outline-dark" for="btnradio2">another</label>
</div>
<div class="form-group">
<label>Address</label>
<input class="form-control" placeholder="Please enter your loctaion" id="Address" type="text">
<input id="hidAddress" type="hidden" value="<?php echo$address;?>">
<label for="">Phone</label>
<input class="form-control" type="text" placeholder="Please enter your phone number" id="Phone">
<input class="form-control" id="hidPhone" type="hidden" value="<?php echo$phone;?>">

<input type="submit" class="btn btn-outline-success mt-2" value="add">
</div>
</form>
</div>
</body>
<script>
function show(){
var x = document.getElementById("Phone");
var y = document.getElementById("Address");
var btn1 = document.getElementById("btnradio1");
var btn2 = document.getElementById("btnradio2");
if(btn1.checked){
    x.value=document.getElementById("hidAddress").value;
    y.value=document.getElementById("hidPhone").value;
}else{
x.value='';
y.value='';
}
if(btn2.checked){
    x.value='';
y.value='';
}else{    
    x.value=document.getElementById("hidAddress").value;
    y.value=document.getElementById("hidPhone").value;

}
}
window.onload= show();
</script>
</html>
<?php
include '../../shared/script.php';
?>