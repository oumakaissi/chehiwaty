<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/b785ef2c37.js" crossorigin="anonymous"></script>
</head>
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
/*
ABOUT
*/
.about .about-single-element .icon{
    font-size: 60px;
    text-align: center;
}
.about .about-single-element{
    text-align: center;
}
.about .about-single-element p{
    text-align: left;
    margin-top: 50px;
}
.own-modal{
    padding-top: 100px;
}
</style>

<body>
<div class="block">
        <header class="header">
            <a href="index.php" class="header-logo">CHEHIWATY </a>
            <nav class="header-menu">
                <ul>
                    <li class="nav-link"><a href="index.php">Accueil</a></li>
                    <li class="nav-link"><a href="#">chehiwat</a>
                        <ul>
                            <li><a href="entrees.php">Nos Entrées</a></li><br/>
                            <li><a href="plats.php">Nos Plats</a></li><br/>
                            <li><a href="desserts.php">Nos Desserts</a></li><br/>
                        </ul>
                    </li>
                   <!-- <li class="nav-link"><a href="login.php">S'identifier</a>
                    <li class="nav-link"><a href="signup.php">S'inscrire</a>-->
                    
                    <li class="nav-link"> <a href="panier.php">Panier  <i class="fas fa-cart-plus"></i></a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="col-md-6 offset-md-3 mt-5">
        <form accept-charset="UTF-8" action="./insert.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Name"> Nom</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Entrer le nom du CHEHIWA" required="required">
            </div>
            <div class="form-group">
                <label for="Code" required="required">Code</label>
                <input type="text" name="code" class="form-control" id="code" aria-describedby="Code" placeholder="Entrer le code du CHEHIWA">
            </div>
            <div class="form-group">
                <label for="price" required="required">prix</label>
                <input type="number" name="price" class="form-control" id="price" aria-describedby="Price" placeholder="Entrer le prix du CHEHIWA">
            </div>
            <div class="form-group">
                <label for="category" required="required">Catégorie</label>
                <input type="number" name="category" class="form-control" id="category" aria-describedby="Category" placeholder="Entrer la Catégorie dU CHEHIWA">
            </div>
            <hr>
            <div class="form-group mt-3">
                <label class="mr-2">Télécharger l'image du CHEHIWA:</label>
                <input type="file" name="fileToUpload" id="fileToUpload"    >
            </div>
            <hr>
            <input type="submit" class="btn btn-primary" value="Ajouter" name="submit">
        </form>
    </div>


</body>

</html>