<?php
session_start();
ob_start();
require_once("Member.php");

if (!empty($_POST["register-user"])) {

    // CREATE TABLE IF NOT EXISTS `registered_users` (
    //     `id` int(8) NOT NULL AUTO_INCREMENT,
    //     `user_name` varchar(255) NOT NULL,
    //     `first_name` varchar(255) NOT NULL,
    //     `last_name` varchar(255) NOT NULL,
    //     `address` varchar(255) NOT NULL,
    //     `address2` varchar(255) NOT NULL,
    //     `city` varchar(255) NOT NULL,
    //     `state` varchar(255) NOT NULL,
    //     `zip` varchar(255) NOT NULL,
    //     `password` varchar(25) NOT NULL,
    //     `email` varchar(55) NOT NULL,
    //     `gender` varchar(20) NOT NULL,
    //     PRIMARY KEY (`id`)
    //   );



    if (!empty($_POST["userName"]))
        $username = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["firstName"]))
        $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["lastName"]))
        $lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["password"]))
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["userEmail"]))
        $email = filter_var($_POST["userEmail"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["address"]))
        $address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["address2"]))
        $address2 = filter_var($_POST["address2"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["city"]))
        $city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["state"]))
        $state = filter_var($_POST["state"], FILTER_SANITIZE_STRING);
    if (!empty($_POST["zip"]))
        $zip = filter_var($_POST["zip"], FILTER_SANITIZE_STRING);

    /* Form Required Field Validation */
    $member = new Member();
    try {
        $errorMessage = $member->validateMember($username, $firstName, $lastName, $address, $address2, $city, $state, $zip, $password, $email);
    } catch (Exception $th) {
        echo $th->getMessage();
    }
    if (empty($errorMessage)) {
        $memberCount = $member->isMemberExists($username, $email);

        if ($memberCount == 0) {
            $insertId = $member->insertMemberRecord($username, $firstName, $lastName, $address, $address2, $city, $state, $zip, $password, $email);
            if (!empty($insertId)) {
                //header("Location: index.php");
                header("Location: ./login.php") ;
            }
        } else {
            $errorMessage[] = "User already exists.";
        }
    }
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
    <title>Chehiwaty</title>
</head>
<body>
<?php include_once('inc/nav.php'); ?>

    <div class="container d-block">
        <div class="row mt-5 pt-3">
            <div class="col-12 col-md-8 offset-0 offset-md-2">
                <form name="frmRegistration" method="post" action="">
                    <div class="h3 text-center pb-1 boder-bottom border-primary">S'inscrire</div>
                    <?php if (!empty($errorMessage) && is_array($errorMessage)) { ?>
                        <div class="error-message">
                            <?php
                            foreach ($errorMessage as $message) {
                                echo $message . "<br/>";
                            } ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="fullNameInput">
                            Nom et Prénom:
                        </label>
                        <div class="row">
                            <div class="col">
                                <input type="text" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>" class="form-control" id="firstName" name="firstName" placeholder="Prénom" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Nom" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usernameInput">Nom d'utilisateur:</label>
                        <input type="text" class="form-control" aria-describedby="Username" id="userName" name="userName" placeholder="Nom" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">
                            Adresse Email:
                        </label>
                        <input type="email" class="form-control" aria-describedby="Email Address" id="userEmail" name="userEmail" placeholder="Entrer Email" value="<?php if (isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">
                            Mot de passe:
                        </label>
                        <input type="password" class="form-control" aria-describedby="Password" id="password" name="password" placeholder="Mot de passe" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPasswordInput">
                            Confirmez le Mot de passe:
                        </label>
                        <input type="password" class="form-control" aria-describedby="Confirm Password" id="confirm_password" name="confirm_password" placeholder="Mot de passe" value="" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Adresse" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Adresse 2" value="<?php if (isset($_POST['address2'])) echo $_POST['address2']; ?>" required>
                    </div>
    
                    <div class="form-group">
                        <input type="text" class="form-control" id="city" name="city" placeholder="Ville" value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php if (isset($_POST['state'])) echo $_POST['state']; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="zip" value="<?php if (isset($_POST['zip'])) echo $_POST['zip']; ?>" required>
                    </div>
    
                    <div class="form-group">
    
                        <div class="">
                            <input type="checkbox" name="terms"> J'accepte termes
                            et conditions
                        </div>
    
                    </div>
                    <div class="form-group">
                        <input class="btn btn-info btn-block active" type="submit" name="register-user" value="Register" class="btnRegister">
                    </div>
                </form>
            </div>
        </div>
    </div>





</body>

</html>