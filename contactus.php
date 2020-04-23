<?php
session_start();

?>
<html>
    <head>
        <meta charset="utf-8">
   <title>Contact us</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
   <link rel="stylesheet" href="main.css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet" >
   <script src="https://kit.fontawesome.com/ef2495b599.js" crossorigin="anonymous"></script>



    <script src="https://kit.fontawesome.com/ef2495b599.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<?php include_once('inc/nav.php'); ?>
    <div class="container">
        <div class="row mt-5 pt-2">
           <div class="col-12 col-md-8 offset-md-2">
            <form action="send_form_email.php" method="post" id="frmLogin">
                <div class="form-group">
                    <label for="emailInput">Prénom:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Entrer votre prénom">
                </div>
                <div class="form-group">
                    <label for="emailInput"> Nom:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Entrer votre nom">
                </div>
                <div class="form-group">
                    <label for="emailInput">Adresse Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre email">
                </div>
                <div class="form-group">
                    <label for="emailInput">Télèphone:</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Entrer votre numéro">
                </div>
                <div class="form-group">
                    <label for="emailInput">Commentaires:</label>
                    <textarea name="comments" class="form-control" id="comments" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-outline-success btn-block" value="Envoyer" name="email_send">
                </div>
            </form>
           </div>
        </div>
    </div>
    
</body>
</html>