<?php 
session_start();
 if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header('location:/Proj/alterPages/signin/signin.php');
}
?>
<body style="background-color: #ffffff;">
<div class="d-flex flex-column p-3 text-white fixed-top col-4" style="background-color: #4f5d75; width: 280px; float:left; height:100% ;">
    <a href="/Proj/alterPages/controlPanel.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4" style="color: #ef8354 ;">Contorl Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="/Proj/alterPages/category/categories.php" class="nav-link text-white fs-4 p-4 fw-bolder"> Categories </a>
        </li>
        <li>
            <a href="/Proj/alterPages/employee/emList.php" class="nav-link text-white fs-4 p-4 fw-bolder"> Employees </a>
        </li>
        <li>
            <a href="/Proj/alterPages/product/product.php" class="nav-link text-white fs-4 p-4 fw-bolder"> Product </a>
        </li>

        <li>
            <a href="/Proj/alterPages/feedback/fbPage.php" class="nav-link text-white fs-4 p-4 fw-bolder"> Feedbacks </a>
        </li>

        <li>
            <a href="/Proj/alterPages/orders/order.php" class="nav-link text-white fs-4 p-4 fw-bolder"> Current Orders </a>
        </li>
        <li>
            <a href="/Proj/alterPages/department/department.php" class="nav-link text-white fs-4 p-4 fw-bolder"> Departments </a>
        </li>
        <li>
            <a href="/Proj/alterPages/customer.php" class="nav-link text-white fs-4 p-4 fw-bolder"> Customers </a>
        </li>
    </ul>
    <hr>
    <ul class="nav nav-pills flex-column ">
        <li>
        <div class="d-grid gap-2">
            <form method="get">
              <button type="submit" name="logout" class="btn nav-link text-white">sign out</button>
              </form>
        </div>
        </li>
    </ul>
</div>