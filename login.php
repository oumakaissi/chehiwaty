<?php
session_start();
if (!empty($_SESSION["user_id"])) {
    header("Location: ./index.php");
}
?>
<html lang="en">

<head>
    
       <meta charset="utf-8">
    <title> CHEHIWAT </title>
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
    <!-- <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <script src="popper/popper.js"></script>
    <script src="jquery/jquery.js"></script> -->
    <title>Chehiwaty</title>
</head>

<body class="d-block">
<script>
        function validate() {
            var $valid = true;
            document.getElementById("user_info").innerHTML = "";
            document.getElementById("password_info").innerHTML = "";

            var userName = document.getElementById("user_name").value;
            var password = document.getElementById("password").value;
            if (userName == "") {
                document.getElementById("user_info").innerHTML = "required";
                $valid = false;
            }
            if (password == "") {
                document.getElementById("password_info").innerHTML = "required";
                $valid = false;
            }
            return $valid;
        }
</script>
    <?php include_once('inc/nav.php'); ?>
    <div class="container d-block">
        <div class="row mt-5 pt-3">
            <div class="col-12 col-md-8 offset-md-2">
                <form action="login-action.php" method="post" id="frmLogin" onSubmit="return validate();">
                    <div class="form-head">
                        S'identifier
                    </div>
    
                    <?php
                    if (isset($_SESSION["errorMessage"])) {
                    ?>
                        <div class="error-message"><?php echo $_SESSION["errorMessage"]; ?></div>
                    <?php
                        unset($_SESSION["errorMessage"]);
                    }
                    ?>
                    
                    
    
                    <div class="form-group">
                        <label for="usernameInput">
                            Nom d'utilisateur:
                        </label>
                        <span id="user_info" class="error-info"></span>
                        <input type="text" class="form-control" aria-describedby="Username" id="user_name" name="user_name" placeholder="Votre Nom">
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">
                            Mot de passe:
                        </label>
                        <span id="password_info" class="error-info"></span>
                        <input type="password" class="form-control" aria-describedby="Password" id="password" name="password" placeholder="Vote mot de passe">
                    </div>
                    <input type="submit" class="btn btn-outline-success btn-block" value="Login" name="login">
                </form>
            </div>
        </div>
    </div>
   
    
</body>

</html>