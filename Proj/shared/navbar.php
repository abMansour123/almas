<?php
session_start();
ob_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location:/Proj/alterPages/signin/signin.php');
}
?> 
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    .logo {
        font-family: 'Poiret One', cursive;
    }
    </style>
</head>

<body style="background-color: #e1d89f;">
    <div class="py-2 bg-white"><img src="/Proj/img/Logo.jpg" width="100px"
            style="display:block;margin-left: auto;margin-right: auto;" alt="logo"></div>
    <nav class="navbar navbar-expand-lg px-4 py-3  sticky-top" style="background-color: #2e0f15;">

        <span class="logo"> <a class="navbar-brand text-light" href="/Proj/index.php">ALMAS</a> </span>

        <?php if (isset($_SESSION['section'])&&$_SESSION['section'] == "customer") { ?>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown" style="background-color: #2e0f15;">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Buy
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item " href="/Proj/alterPages/woman.php"> Woman's Accessories</a>
                        </li>
                        <li><a class="dropdown-item" href="/Proj/alterPages/man.php"> Men's Accessories</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-light" href="/Proj/alterPages/orders/cart.php"><i
                            class="bi bi-cart3"></i> Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-light" href="/Proj/alterPages/orders/myorders.php"><i
                            class="bi bi-list-check"></i> Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-light" href="/Proj/alterPages/myprofile/profile.php"><i
                            class="bi bi-person-circle"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <form method="POST" class="d-flex" action="/Proj/alterPages/search/search.php">
                        <input name="data" class="form-control  me-2" type="search" placeholder="Search"
                            aria-label="Search">
                        <button name="submit-search" class="btn btn-outline-success my-2 my-sm-0"
                            type="submit">Search</button>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form method="GET" >
                        <button type="submit" name="logout" class="mt-3 mx-3 border-0  btn btn-outline-light btn-sm">Log
                            Out</button>
                    </form>
                </li>
            </ul>
        </div>
        <?php } else { ?>
        <form class="nav-item ms-auto">
            <a class="nav-link text-light " href="/Proj/alterPages/signin/signin.php"><i
                    class="bi bi-person-circle"></i>Sign in</a>
        </form>

        <?php } ?>
    </nav>