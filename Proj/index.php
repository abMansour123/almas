<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title> Almas </title>
    <link rel="stylesheet" href="./shared/style.css">
</head>
<?php
include './shared/config.php';
include './shared/navbar.php';
?>

<div class="container col-8 mt-5 ">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../3DosProj/img/carosel1.jpeg" class="d-block w-100  h-75" alt="1">
            </div>
            <div class="carousel-item">
                <img src="../3DosProj/img/carosel2.jpg" class="d-block w-100 h-75" alt="2">
            </div>
            <div class="carousel-item">
                <img src="../3DosProj/img/carosel3.jpg" class="d-block w-100  h-75" alt="3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container col-8 my-5">
    <P class="fs-1 fw-bold logo">Choose Your Category</P>
</div>
<div class="container col-8 my-5 text-center">
    <div class="row">
        <div class="col-md-6 gogo">
            <a href="./alterPages/woman.php">
                <img src="../3DosProj/img/woman.jpg" width="420" height="520">
            </a>
        </div>
        <div class="col-md-6 gogo">
            <a href="./alterPages/man.php">
                <img src="../3DosProj/img/man.jpg" width="420" height="520">
            </a>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['submit-search'])) {
        header('location:alterPages/search/search.php');
        ob_end_flush();
    }

include './shared/footer.php';
include './shared/script.php' ?>