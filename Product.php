<?php


class Product
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }



    function insertProductRecord($name, $code, $image, $price, $category)
    {
        $query = "INSERT INTO products (name, code, image, price, category) VALUES (?, ?, ?, ?, ?)";
        $paramType = "sssss";
        $paramArray = array(
            $name,
            $code,
            $image,
            $price,
            $category
        );
        $insertId = $this->ds->insert($query, $paramType, $paramArray);
        return $insertId;
    }

    /**
     * get the products by category
     */
    function getProductByCategory($category){
        $query = "select * From products WHERE category=?";
        $paramType = "s";
        $paramArray = array(
            $category
        );
        $productResult = $this->ds->select($query, $paramType, $paramArray);
        return $productResult;

    }
    /**
     * get the product by code
     */
    function getProductByCode($productCode)
    {
        $query = "select * FROM products WHERE code = ?";
        $paramType = "s";
        $paramArray = array($productCode);
        $productResult = $this->ds->select($query, $paramType, $paramArray);
        return $productResult;
    }

    function getProducts()
    {
        $query = "select * FROM products ORDER BY id ASC";
        $paramType = "";
        $paramArray = "";
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        return $memberResult;
    }
    
}
