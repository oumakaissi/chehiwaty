<!-- dasdasd -->
<?php
session_start();
ob_start();
?>


<html>

<head>
    <meta charset="utf-8">
    <title> CHEHIWAT </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ef2495b599.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!--plus-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
</head>

<body>

<?php include_once('inc/nav.php'); ?>

<div class="container-fluid">
    <div class="block row">
        <div class="px-0 col-12 position-relative banner">
            <img src="img/ph.jpg" alt="chehiwat" class="banner-image">
            <div class="banner-content">
                <h1 class="title is=1"> Bonne Appétit!</h1>
                <h2 class="subtitle"> Découvrez votre plats préfèrés</h2>
                <a href="contactus.php"><button class="button is-link" id="open_modal">Contactez-Nous</button></a>
            </div>
        </div>
    </div>
    
    <!----a propos-->
    <div class="block">
        <h1 class="subtitle heading-site h3 border-bottom border-primary pb-2">À propos </h1>
        <div class="container about">
            <div class="row">
                <div class="col-12 col-md-3 pb-2 border-left border-success about-single-element">
                    <div class="mb-4 text-center"><i class="fas fa-download fa-3x icon"></i></div>
                    <p>
                        vous pouvez telecharger le rapport de ce projet ici
                        <a href="rapport/rapport_php.pdf"<button class="btn btn-outline-primary btn-block">Telechager</button></a>
                    </p>
                </div>
                <div class="col-12 col-md-3 pb-2 border-left border-success about-single-element">
                    <div class="mb-4 text-center"><i class="fas fa-birthday-cake fa-3X icon"></i></div>
                    <p>
                        Un gâteau givré avec des bougies allumées, comme présenté pour une fête d'anniversaire. Le style de gâteau varie considérablement d'une plateforme à l'autre. Avec du glaçage blanc et des  fraises , les créations d'Apple et de Google suggèrent un  gâteau de Noël japonais . D'autres vendeurs illustrent un gâteau au chocolat, rose et / ou éponge.
                    </p>
                </div>
                <div class="col-12 col-md-3 pb-2 border-left border-success about-single-element">
                    <div class="mb-4 text-center"><i class="fas fa-utensils fa-3x icon"></i></div>
                    <p>
                        Fourchettes et Couteaux allie finesse et élégance pour un style parfaitement maîtrisé. Cet établissement gastronomique nous propose une carte modifiée chaque mois. Une recherche perpétuelle d'alliance de saveurs dans des mets locaux, qui séduit. Idéalement placé dans la capitale quercynoise de la truffe, ce restaurant met à la carte, chaque jour de marché aux truffes, un menu où le diamant noir est à l'honneur.

                    </p>
                </div>
                <div class="col-12 col-md-3 pb-2 border-left border-success about-single-element">
                    <div class="mb-4 text-center"><i class="fas fa-pepper-hot fa-3x icon"></i></div>
                    <p>
                       Un piment fantôme est un type spécifique de piment fort, originaire de certaines régions de l'Inde et du Sri Lanka, qui est considéré par beaucoup comme le piment le plus chaud qui existe. Le terme local pour cette variété de poivre est bhut jolokia , et les habitants de ces régions comprennent que le terme «poivre fantôme» a été largement utilisé par le public occidental. Ce poivre a été abondamment exporté dans le monde entier pour être utilisé dans des recettes qui nécessitent une intensité de saveur spécifique.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    <!---Contact-->
    
</body>


</html>