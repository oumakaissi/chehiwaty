<?php


if (!empty($_POST["login"])) {
    session_start();
    $username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    require_once("Member.php");
    $member = new Member();
    $isLoggedIn = $member->processLogin($username, $password);
    if (!$isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
    } else {
        require_once("Panier.php");
        $panierObject = new Panier;
        $panier = $panierObject->getPanier();
    }
    header("Location: ./login.php");

    exit();
}
