<?php

// namespace Phppot;

// use \Phppot\DataSource;
// use \Phppot\Achat;

class Panier
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }

    function emptyPanier()
    {
        $query = "DELETE FROM user_carts WHERE user_id = ?";
        $paramType = "i";
        $paramArray = array(
            $_SESSION["user_id"]
        );
        $insertId = $this->ds->insert($query, $paramType, $paramArray);
        return $insertId;
    }

    function setPanier()
    {

        if (!empty($_SESSION["user_id"])) {

            if (!empty($_SESSION["cart_item"])) {
                $this->emptyPanier();
                $serialized_cart = serialize($_SESSION["cart_item"]);
                $query = "INSERT INTO user_carts (user_id, user_cart) VALUES (?, ?)";
                $paramType = "is";
                $paramArray = array(
                    $_SESSION["user_id"],
                    $serialized_cart
                );
                $insertId = $this->ds->insert($query, $paramType, $paramArray);

                return $insertId;
            }
        }
        return;
    }

    function getPanier()
    {
        if ($_SESSION["user_id"]) {
            $query = "SELECT * from user_carts WHERE user_id = ?";
            $paramType = "i";
            $paramArray = array($_SESSION["user_id"]);
            try {
                $cartResult = $this->ds->select($query, $paramType, $paramArray);
            } catch (\Throwable $th) {
                throw $th;
            }
            $cart = unserialize($cartResult[0]["user_cart"]);

            if (!empty($_SESSION["user_cart"])) {
                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $cart);
                $this->emptyPanier();
                $this->setPanier();
            } else {
                $_SESSION["cart_item"] = $cart;
            }
            return true;
        }
    }

    function getPanierProducts($panier)
    {
        $products = array();
        require_once("Product.php");

        $productObject = new Product();
        foreach ($panier as $key => $value) {
            # code...
            array_push($products, $productObject->getProductByCode($panier[$key]["code"]));
        }
        return $products;
    }
}
