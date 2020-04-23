<?php


session_start();

require_once("Product.php");
$product = new Product();
require_once("Panier.php");
$panier = new Panier();

//cart in session
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
            //added to cart
        case "add":
            // check if the quantity passed by the post method is empty or note
            // return true if not empty
            if (!empty($_POST["quantity"])) {
                // run the query tp select the product from tblproduct where the code is 
                // the code we got using the get method
                $productByCode = $product->getProductByCode($_GET["code"]);
                // $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                // create an itemArray to store the product retrieved from the database as an array
                $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'image' => $productByCode[0]["image"]));

                //check if the cart_item in the current session is not empty
                // return true if it's not empty
                if (!empty($_SESSION["cart_item"])) {
                    //check if the article already exist in the cart
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                        // loop through the elements of the cart
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            // look for the element that equals the element selected using the query earlier
                            if ($productByCode[0]["code"] == $k) {
                                // if the cart is empty
                                // set the session quantity of the element to 0
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                // add the quantity to the old quantity in the session
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    }
                    // if it doesn't exist add it to the cart_item in the session 
                    else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                }
                // if the cart_item in the current session is empty then simply 
                // set it equal to the itemArray 
                else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            if (!empty($_SESSION["user_id"])) {
                $panier->setPanier();
            }
            break;

            //if the action is remove from cart
        case "remove":
            // if the cart_item in the session is not empty
            if (!empty($_SESSION["cart_item"])) {
                // loop on each element and unset it from the current session
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            if (!empty($_SESSION["user_id"])) {
                $panier->setPanier();
            }
            break;
            // if the action is empty the whole cart
        case "empty":
            // unset the cart_item from the current session
            unset($_SESSION["cart_item"]);
            if (!empty($_SESSION["user_id"])) {
                $panier->emptyPanier();
            }
            break;
    }
}
?>

<html>
    <head>
   <meta charset="utf-8">
   <title> Nos Plats </title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ef2495b599.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script></script>
    <!--plus-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    </head>
<body>

<?php include_once('inc/nav.php'); ?>

    <div class="container ">
        <div class="card-columns">
            <?php
            $productController = new Product();
            $product_array = $productController->getProductByCategory("plat");
            if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
            ?>

            
                <div class="card text-white bg-dark mb-3">
                    <img class="card-img" src="<?php echo $product_array[$key]["image"]; ?>" alt="Vans">
                    <div class="card-body">
                        <div class="d-flex">
                            <h4 class="card-title"><?php echo $product_array[$key]["name"]; ?></h4>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <form method="post" action="plats.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                                    <small class="mt-3 justify-content-end text-success"><?php echo  $product_array[$key]["price"]."DH"; ?></small>
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control w-25" name="quantity" value="1" size="2" />
                                        <input type="submit" value="Add to Cart" class="btn btn-danger btn-block" />
                                    </div>
                                </form>
                        
                            </div>
                        </div>
                    </div>
                </div>
        
            
            <?php }} ?>
        </div>
    </div>

    </body>
</html>