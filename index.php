<?php
// Votre code PHP ici
session_start();

// Initialisation du message d'alerte
$alertMessage = '';

// Vérification des champs email et password
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connexion à la base de données
    $servername = "localhost";
    $user = "root";
    $password = "";
    $database = "MAT";

    // Create connection
    $connexion = new mysqli($servername, $user, $password, $database);
    if ($connexion->connect_error) {
        die("Échec de la connexion : " . $connexion->connect_error);
    }

    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password  = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($email)) {
        $alertMessage = "Email is required.";
    } elseif (empty($password)) {
        $alertMessage = "Password is required.";
    } else {
        // Requête SQL pour vérifier l'authentification
        $query = "SELECT * FROM staff WHERE  Email='$email' AND Password='$password'";
        $result = $connexion->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["id"] = $row["IdStaff"];
                $_SESSION["Nom"] = $row["Nom"];
                $_SESSION["Position"] = $row["Position"];
                $_SESSION["Prenom"] = $row["Prenom"];
                $_SESSION["email"] = $row["Email"];

                if($row["Position"] == "Directeur"){
                    header("Location: Admin.php");
                }else if($row["Position"] == "Technique"){
                    header("Location: AissaSeaces.php");
                }else if($row["Position"] == "Inscription"){
                    header("Location: Amal.php");
                }else if($row["Position"] == "Comptabilité"){
                    header("Location: NejouaDirecteur.php");
                }
                exit; 
            }
        } else {
            // Identifiants incorrects
            $alertMessage = "Incorrect email or password!";
        }
    }
    // Fermeture de la connexion
    $connexion->close();
}
?>

<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/FinalLogo.png">
    <!-- Page Title  -->
    <title>Se Conneter</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/css/dashlite.css">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css">
    <style>
    body {
        background-image: url('./images/ThirdLogo.webp');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover; 
            width: 100%;
            height: 30vh; 
            margin: 0;
            padding: 0;
            opacity: 1;
        }
  </style>
</head>

<body class="nk-body ui-rounder npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-1 text-center">
                            <a href="" class="logo-link">
                                <!-- <img class="logo-light logo-img logo-img-lg" src="./images/FinalLogo.png" srcset="./images/logo2x.png 2x"  alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="./images/FinalLogo.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark"> -->
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <?php if (!empty($alertMessage)): ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?php echo $alertMessage; ?>
                                    </div>
                                <?php endif; ?>

                                <form action="index.php" method="post" >
                                <div class="brand-logo pb-1 text-center">
                            <a href="index.php" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="./images/FinalLogo.png"  alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="./images/FinalLogo.png" alt="logo-dark">
                            </a>
                        </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <input type="email" name="email" 
                                        class="form-control form-control-lg" id="default-01" 
                                        placeholder="Enter your email">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Mot de Passe</label>
                                            <!-- <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot Code?</a> -->
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">Se Connecter</button>
                                    </div>
                                </form>
                                
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>--------</span></h6>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-3">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2024 CryptoLite. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="assets/js/bundle.js"></script>
    <script src="assets/js/scripts.js"></script>

</html>