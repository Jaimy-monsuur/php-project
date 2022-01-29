<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The cheese webshop</title>
    <link rel="shortcut icon" type="ico" href="https://the-cheese-shop.herokuapp.com//Resources/img/favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://the-cheese-shop.herokuapp.com//Resources/css/stylesheet.css">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container ">
            <a class="navbar-brand" href="/">Cheese webshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/about">About</a>
                    </li>
                </ul>
                <?php
                ?>
                <ul class="navbar-nav mb-2 mb-md-0 float-right">
                    <?php if($_SESSION['Logged_in'] == false){
                        echo '<li class="nav-item ">';
                        echo '<a class="btn btn-outline-primary m-2 " href="/Login">Login</a>';
                        echo '</li>';
                    }
                    ?>
                    <?php  if($_SESSION['Logged_in'] == true){
                    echo '<li class="nav-item ">';
                    echo '<a class="btn btn-primary m-2 " href="/Login/Logout">Log out</a>';
                    echo '</li>';
                }
                else {
                    echo '<li class="nav-item ">';
                    echo '<a class="btn btn-primary m-2" href="/Sign_up">Sign-up</a>';
                    echo '</li>';
                }
                ?>
                    <li class="nav-item ">
                        <a class="btn btn-primary m-2" href="/Cart">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-cart" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            Shoping cart
                        </a>
                    </li>
                    <?php if($_SESSION['Logged_in'] == true){
                    echo '<li class="nav-item ">';
                    echo '<a class="nav-link " href="/Profile" id="ProfileLink" role="button">';
                    echo $_SESSION['user'] . " ";
                    echo '<img src="https://the-cheese-shop.herokuapp.com//Resources/img/profile.jpg" width="40" height="40" class="rounded-circle">';
                    echo '</a>';
                    echo '</li>';
                    } 
                    ?>
 
                </ul>
            </div>
        </div>
    </nav>