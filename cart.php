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
                // $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'image' => $productByCode[0]["image"]));
                $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'image' => $productByCode[0]["image"], 'category' => $productByCode[0]["category"]));


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


<html lang="en">
<head>
<meta charset="utf-8">
   <title> Panier </title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
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
<!--ajouter-->
<style>
      .heading-site{
    text-align: center;
    font-family: 'Montserrat', sans-serif;
}
.COLORED {
    height: 400px;
    width: 100%;
    background-color: #ff9f43;
    padding: 30px;
    text-align: center;

}

/*
HEADER
*/
.header{
    width: 100%;
    margin-left: 0;
    margin-right: 0;
    height: 70px;
    line-height: 70px;
    background-color: rgba(0, 0 ,0 ,0);
    position: fixed;
    top: 0;
    z-index: 999;}
    .header .header-logo{
      color: coral;
      font-family: 'Montserrat', sans-serif;
      float: left;
      margin-left: 30px;
      position: fixed;
}
.header .header-menu{
      float: right;
      margin-right: 30px;
      overflow: hidden;

}
.header .header-menu a{
    margin-right: 15px;
    color: coral;
    font-family: 'Montserrat', sans-serif;
}
.header .header-menu a:hover{
    color: cornflowerblue;
}

.header .header-menu ul li{
        list-style: none;
        float:left;
        margin-left: 160px;
    }

.header .header-menu ul li a {
    text-decoration: none;
    width: 100px;
    text-align: center;
    line-height: 50px;
}
.header .header-menu ul ul{
    position: absolute;
    visibility: hidden;
}
.header .header-menu ul ul li a{
    width: auto;
    clear: both;
    display: block;
    height: 30px;
    line-height: 30px;
    text-align:left;
    color:white;
    border-top:  solid white;
    margin-left: -120px;
    background-color: coral;
}
.header ul li:hover ul{
    visibility: visible;
}




</style>
    <body>
<?php include_once('inc/nav.php'); ?>
<!--ajouter-->

<div class="px-4 px-lg-0">
  <!-- For demo purpose -->
  <div class="container text-white py-5 text-center">
    <h1 class="display-4">Bootstrap 4 shopping cart</h1>
    <p class="lead mb-0">Build a fully structred shopping cart page using Bootstrap 4. </p>
    <p class="lead">Snippet by <a href="https://bootstrapious.com/snippets" class="text-white font-italic">
            <u>Bootstrapious</u></a>
    </p>
  </div>
  <!-- End -->

  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Les Achats</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Prix</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantité</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Supprimer</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                
              
                <?php
            foreach ($_SESSION["cart_item"] as $item) {
                $item_price = $item["quantity"] * $item["prix"];
            ?>

                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?php echo $item["image"]; ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $item["name"]; ?></a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: nouritture</span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong><?php echo  $item["price"]."DH"; ?></strong></td>
                  <td class="border-0 align-middle"><strong><?php echo $item["quantity"]; ?></strong></td>
                  <td class="border-0 align-middle"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
                </tr>

                
            <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"] * $item["quantity"]);
            }
            ?>

              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Code Promo</div>
          <div class="p-4">
            <p class="font-italic mb-4">Si vous avez un code promo, veuillez le saisir dans la case ci-dessous</p>
            <div class="input-group mb-4 border rounded-pill p-2">
              <input type="text" placeholder="Appliquer le promo" aria-describedby="button-addon3" class="form-control border-0">
              <div class="input-group-append border-0">
                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Appliquer le promo</button>
              </div>
            </div>
          </div>
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions pour le vendeur</div>
          <div class="p-4">
            <p class="font-italic mb-4"> Si vous avez les informations sur le vendeur,vous pouvez les laisser dans la case ci-dessous</p>
            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">La Facture</div>
          <div class="p-4">
            <p class="font-italic mb-4">Les frais d'expédition et supplémentaires sont calculés en fonction des valeurs que vous avez saisies.</p>
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong><?php echo  number_format($total_price, 2). "DH"; ?></strong></strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Frais de port et de manutention</strong><strong>0.00 DH</strong></li>
               <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Frais de Livraison</strong><strong>40.00 DH</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>0.00 DH</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Adresse</strong><textarea name="" cols="30" rows="2" class="form-control"></textarea>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold"><?php if($total_price !=0){ echo  number_format($total_price+40, 2). "DH";}else{echo  " 0.00 DH";} ?></h5>
              </li>
            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Passer à la caisse</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>