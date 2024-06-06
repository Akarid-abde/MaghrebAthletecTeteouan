<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $Nom = $_SESSION["Nom"];
    $position = $_SESSION["Position"];
}else{
    header("Location: index.php");
}

if (isset($_SESSION["messagesuccess"])) {
    $messagesuccess = $_SESSION["messagesuccess"];
}
?>

<?php   if ($position == "Comptabilité" || $position == "Directeur") { ?>

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
    <title>Add Charges</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/css/dashlite.css?ver=2.4.0">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css?ver=2.4.0">
</head>

<body class="nk-body ui-rounder npc-default has-sidebar ">

    <!-- app-root  -->
    <div class="nk-app-root">
        <div class="nk-sidebar" data-content="sidebarMenu">
            <div class="nk-sidebar-bar">
                <div class="nk-apps-brand">
                    <a href="AissaEntraneur.php" class="logo-link">
                    <img class="logo-light logo-img" src="images/FinalLogo.png" srcset="./images/logo-small2x.png 2x" alt="logo">
                        <img class="logo-dark logo-img" src="images/FinalLogo.png" srcset="./images/logo-dark-small2x.png 2x" alt="logo-dark">
                    </a>
                </div>
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-body">
                        <div class="nk-sidebar-content" data-simplebar>
                            <div class="nk-sidebar-menu">
                                <!-- Menu -->
                                <ul class="nk-menu apps-menu">
                                    <li class="nk-menu-item active">
                                        <a href="#" class="nk-menu-link nk-menu-switch" data-target="navDashboards">
                                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                        </a>
                                    </li>
                                  
                                </ul>
                            </div>
                       
                        </div>

                         <!-- Se deconnecter Bottom -->
                        <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                            <a href="#" data-toggle="dropdown" data-offset="50,-50">
                                <div class="user-avatar">
                                    <span>MAT</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md ml-4">
                                <div class="dropdown-inner user-card-wrap d-none d-md-block">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span>MAT</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text"> <?php echo $Nom ; ?> </span>
                                            <span class="sub-text text-soft"><?php echo $email; ?></span>
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="Logout.php"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="nk-sidebar-main is-light">
                <div class="nk-sidebar-inner" data-simplebar>

                    <div class="nk-menu-content menu-active" data-content="navDashboards">
                        <h5 class="title">Gérer  Charges</h5>
                        <ul class="nk-menu">
                              <?php   if ($position == "Directeur") { ?>
                            <li class="nk-menu-item">
                                <a href="Admin.php" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                    <span class="nk-menu-text">Inscription</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        
                            <li class="nk-menu-item">
                                <a href="AissaSeaces.php" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                    <span class="nk-menu-text">Séances</span>
                                </a>
                            </li><!-- .nk-menu-item -->

                            <li class="nk-menu-item">
                                <a href="AissaEntraneur.php" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                    <span class="nk-menu-text">Entraineurs</span>
                                </a>
                            </li><!-- .nk-menu-item -->

                            <li class="nk-menu-item">
                                <a href="NejouaDirecteur.php" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                    <span class="nk-menu-text">Revenues</span>
                                </a>
                            </li><!-- .nk-menu-item -->

                            <li class="nk-menu-item">
                                <a href="NejouaDirecteurCharges.php" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                    <span class="nk-menu-text">Charges</span>
                                </a>
                            </li><!-- .nk-menu-item -->

                            <li class="nk-menu-item">
                                <a href="ManageStaff.php" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                    <span class="nk-menu-text">Gestion Users</span>
                                </a>
                            </li><!-- .nk-menu-item -->

                            <?php   } elseif($position == "Technique") { ?>
                            <ul class="nk-menu">
                            <li class="nk-menu-item">
                                <a href="AissaSeaces.php" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                    <span class="nk-menu-text">Séances</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                            <ul class="nk-menu">
                            <li class="nk-menu-item">
                                <a href="AissaEntraneur.php" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                    <span class="nk-menu-text">Entraineurs</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                            <?php }  ?>
                        </ul><!-- .nk-menu -->
                 
                    </div>
       
                </div>
            </div>
        </div>
        <!-- main  -->
        <div class="nk-main ">
            <!-- wrap  -->
            <div class="nk-wrap ">

                <!--  header  -->
                <div class="nk-header nk-header-fixed nk-header-fluid is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                        
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-inner user-card-wrap bg-lighter">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>MAT</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text"> <?php echo $Nom ; ?> </span>
                                                        <span class="sub-text text-soft"><?php echo $email; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="Logout.php"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- end header  -->

                 <!-- content @s -->
                 <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-head-sub"><a class="back-to" href="NejouaDirecteurCharges.html"><em class="icon ni ni-arrow-left"></em><span>Charges</span></a></div>
                                            <!-- <h2 class="nk-block-title fw-normal">Charges</h2> -->
                                           
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                               <a href="NejouaDirecteurCharges.php" class="btn btn-primary"><em class="icon ni ni-reports"></em><span> Consulter Statistiques</span></a>
                                            </div>
                                            <?php if (isset($_SESSION["messagesuccess"])) { ?>
                                               <?php  echo '<div id="successMessage" class="alert alert-success mt-3">' . $_SESSION["messagesuccess"] . '</div>'; ?>
                                               <?php  unset($_SESSION["messagesuccess"]);  ?>
                                            <?php } ?>
                                            
                                        </div>
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                <form action="AddCharge.php" method="POST">
    <span class="preview-title-lg overline-title">Add Charge</span>
    <div class="row gy-4">

        <!-- <div class="col-sm-6">
            <div class="form-group">
                <label class="form-label" for="idcharge">IdCharge</label>
                <div class="form-control-wrap">
                    <input type="number" name="IdCharge" class="form-control" id="idcharge" placeholder="IdCharge" required>
                </div>
            </div>
        </div> -->

        <div class="col-sm-6">
            <div class="form-group">
                <label class="form-label" for="prixmateriaux">PrixMateriaux</label>
                <div class="form-control-wrap">
                    <input type="number" name="PrixMateriaux" class="form-control" id="prixmateriaux" placeholder="PrixMateriaux" step="0.01" required>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="form-label" for="transport">Transport</label>
                <div class="form-control-wrap">
                    <input type="number" name="Transport" class="form-control" id="transport" placeholder="Transport" step="0.01" required>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label class="form-label" for="assurance">Assurance</label>
                <div class="form-control-wrap">
                    <input type="number" name="Assurance" class="form-control" id="assurance" placeholder="Assurance" step="0.01" required>
                </div>
            </div>
        </div>
        
    </div>
    <hr class="preview-hr">
    <div class="col-lg-12 center">
        <div class="form-group">
            <div class="form-control-wrap">
                <input type="submit" class="btn btn-primary" value="Add Charge">
            </div>
            
        </div>
    </div>
</form>
                                              
                                                 
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->
                                       
                                    </div><!-- .nk-block -->
                                    
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->

            </div>
            <!-- wrap  -->
        </div>
        <!-- main  -->

    </div>
    <!-- app-root  -->
    
    <!-- JavaScript -->
    <script src="assets/js/bundle.js?ver=2.4.0"></script>
    <script src="assets/js/scripts.js?ver=2.4.0"></script>
    <script src="assets/js/charts/chart-ecommerce.js?ver=2.4.0"></script>
    <script src="script.js"></script>
    <script>
        function hideAlert() {
            var alert = document.getElementById('successMessage');
            alert.style.opacity = '0';
            setTimeout(function() { alert.style.display = 'none'; }, 600);
        }
        window.onload = function() {
            setTimeout(hideAlert, 3000); // Hide after 3 seconds
        };
    </script>
</body>

</html>

<?php }  else {  
      header("Location: Error.php");
}
    
    ?>