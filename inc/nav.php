<?php 
session_start();
?>
<style>
    .here{margin-bottom:56px}
</style>
<nav class="here navbar fixed-top bg-dark" style="opacity: 0.7">
    <ul class="nav mr-auto">
        <li class="nav-item active">
            <a href="index.php" class="nav-link btn-outline-info">
                CHEHIWATY
                <i class="fa fa-home" aria-hidden="true"></i>
            </a>
        </li>
    </ul>
    <div class="dropdown d-none d-md-block">
        <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            CHEHIWAT
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="entrees.php">Nos Entrées</a>
            <a class="dropdown-item" href="plats.php">Nos Plats</a>
            <a class="dropdown-item" href="desserts.php">Nos Desserts</a>
        </div>
    </div>
    <?php if (!empty($_SESSION["role"]) && $_SESSION["role"] == "admin") { ?>
        <a href="Dashboard.php" class="nav-link btn-outline-info">
            Dashboard
        </a>
    <?php }
        if (empty($_SESSION["user_id"])) { 
        echo '<ul class="nav nav-pills">
            <li class="nav-item">
                <a href="cart.php" class="nav-link btn-outline-info">
                    <span class="d-none d-md-inline">Panier</span> <i class="fa fa-cart-plus"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="signup.php" class="nav-link btn-outline-warning">
                    <span class="d-none d-md-inline">s\'inscrire</span> <i class="fa fa-plus"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link btn-outline-success">
                    <span class="d-none d-md-inline">s\'identifier</span> <i class="fa fa-user"></i>
                </a>
            </li>
        </ul>';

     } else {  
   
        require_once("Member.php");
            $user =  new Member();
            $currUser = $user->getMemberById($_SESSION["user_id"]);
            echo '
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link btn-outline-success text-white">
                ' . $currUser[0]["first_name"]
                . '
                </a>
            </li>
            <li class="nav-item">
                <a href="cart.php" class="nav-link btn-outline-info">
                    Panier
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link btn-outline-warning">
                    Logout
                </a>
            </li>
        </ul>';
     } ?>
</nav>