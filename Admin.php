<?php
session_start();
include 'db_connect.php';

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

// Query to fetch data from the adherent table
$sql = "SELECT * FROM adhérent";
$result = $conn->query($sql);

?>

<?php   if ($position == "Directeur") { ?>

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
    <title>Inscription</title>
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
                    <a href="Admin.php" class="logo-link">
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
                        <h5 class="title">Nouveau Membre</h5>

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

                            <?php   }  ?>

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
                                            <div class="nk-block-head-sub"><a class="back-to" href="Amal.html"><em class="icon ni ni-arrow-left"></em><span>Inscripton</span></a></div>
                                            <h2 class="nk-block-title fw-normal">Inscription</h2>
                                           
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Nouveau Membre</h4>
                                            </div>
                                            <?php if (!empty($messagesuccess)): ?>
                                    <div class="alert alert-success mt-3" role="alert">
                                        <?php echo $messagesuccess; ?>
                                    </div>
                                <?php endif; ?>
                                        </div>

                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <form action="AddAdhérent.php" method="POST" id="carsForm" enctype="multipart/form-data">
                                                    <span class="preview-title-lg overline-title">Information Personnel</span>
                                                    <div class="row gy-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">NOM</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" name="Nom" class="form-control" id="default-01" placeholder="Nom">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">PRENOM</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" name="Prenom" class="form-control" id="default-01" placeholder="Prenom">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-03">CIN PARENT</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-icon form-icon-left">
                                                                        <em class="icon ni ni-user"></em>
                                                                    </div>
                                                                    <input type="text" name="CINParent" class="form-control" id="default-03" placeholder="CIN PARENT">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-04">Tele</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-icon form-icon-right">
                                                                        <em class="icon ni ni-mail"></em>
                                                                    </div>
                                                                    <input type="text" name="tele" class="form-control" id="default-04" placeholder="+212600000000 ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-textarea">Adress</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea name="Adresse" class="form-control no-resize" placeholder="Adresse" id="default-textarea"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <div class="form-icon form-icon-right">
                                                                        <em class="icon ni ni-calendar-alt"></em>
                                                                    </div>
                                                                    <input type="text" name="DateNaissance" class="form-control form-control-xl form-control-outlined date-picker" id="outlined-date-picker">
                                                                    <label class="form-label-outlined" for="outlined-date-picker">Date Naissance</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">Photo</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="custom-file">
                                                                        <input type="file" name="photo" multiple class="custom-file-input" id="customFile">
                                                                        <label class="custom-file-label" for="customFile">Upload Photo</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div id="entraineur"></div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div id="Categories"></div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div id="Séances"></div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div id="Terains"></div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div id="payement"></div>
                                                        </div>
                                                      
                                                    </div>
                                                    </div>
                                                    <hr class="preview-hr">


                                                    <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <span class="preview-title-lg overline-title">Payement (DH)</span>
                                                    <div class="row gy-4">
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <div class="form-icon form-icon-right">
                                                                        <em class="icon ni ni-user"></em>
                                                                    </div>
                                                                    <input type="text" name="N_Compte" class="form-control form-control-xl form-control-outlined" id="outlined-right-icon">
                                                                    <label class="form-label-outlined" for="outlined-right-icon">N Compte</label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select name="Bank" class="form-select form-control form-control-xl" data-ui="xl" id="outlined-select">
                                                                        <option value="default_option">Bank</option>
                                                                        <option value="CIH">CIH</option>
                                                                        <option value="Bank Chaabi">Bank Chaabi</option>
                                                                        <option value="Attijari">Attijari</option>
                                                                    </select>
                                                                    <label class="form-label-outlined" for="outlined-select">Select Bank</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="Number" name="Montant" class="form-control form-control-xl form-control-outlined" id="outlined-normal">
                                                                    <label class="form-label-outlined" for="outlined-normal">Montant</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-sm-6">
                                                        <div class="preview-block">
                                                            <span class="preview-title overline-title">Assurance</span>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="Assurance" class="custom-control-input" checked id="customCheck2">
                                                                <label class="custom-control-label" for="customCheck2">Inclus</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->

                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="row gy-6">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="preview-block">
                                                            <span class="preview-title overline-title">Type Membre</span>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="normal" name="IdTypeAdherent" value="1" checked class="custom-control-input">
                                                                <label class="custom-control-label" for="normal">Normal</label>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="Pistonné" name="IdTypeAdherent" value="2" class="custom-control-input">
                                                                <label class="custom-control-label" for="Pistonné">Pistonné</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="preview-block">
                                                            <span class="preview-title overline-title">Transport</span>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="Oui" name="Transport" value="Oui" checked class="custom-control-input">
                                                                <label class="custom-control-label" for="Oui">Oui</label>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="Non" name="Transport" value="Non" class="custom-control-input">
                                                                <label class="custom-control-label" for="Non">Non</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->
                                                  
                                        <div class="col-lg-12 center">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="submit" class=" btn btn-primary" value="Ajouter">
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

<div class="col-xxl-8">
    <div class="card card-full">
        <div class="card-inner">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Adhérents</h6>
                </div>
            </div>
        </div>
        <div class="nk-tb-list mt-n2">
            <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col"><span>Order No.</span></div>
                <div class="nk-tb-col tb-col-sm"><span>Nom</span></div>
                <div class="nk-tb-col tb-col-sm"><span>Prenom</span></div>
                <div class="nk-tb-col tb-col-md"><span>Date Naissance</span></div>
                <div class="nk-tb-col"><span>Montant</span></div>
                <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                <div class="nk-tb-col"><span class="d-none d-sm-inline">Imprimer</span></div>
            </div>
            
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">
                                    <?php echo $row["IdAdhérent"]; ?>
                                </a></span>
                        </div>

                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar sm bg-purple-dim">
                                    <span></span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">
                                        <?php echo $row["Nom"]; ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar sm bg-purple-dim">
                                    <span></span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">
                                        <?php echo $row["Prenom"]; ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">
                                <?php echo $row["DateNaissance"]; ?>
                            </span>
                        </div>

                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">
                                <?php echo $row["Montant"]; ?>
                                <span>DH</span>
                            </span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs badge-success">
                                <?php   if ($row["IdTypeAdherent"] == 1) {
                                    echo "Normale";
                                } elseif ($row["IdTypeAdherent"] == 2) {
                                    echo "Pistone";
                                } else {
                                    echo "Unknown"; // Or handle other cases as needed
                                } ?>
                            </span>
                        </div>
                        <form action="Imprimer.php" method="post">

                        <input type="text" value="<?php echo $row["IdAdhérent"]; ?>" name="IdAdhérent" hidden="true">
                        
                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs badge-success">
                               <button value="Imprimer" class="btn btn-warning">IMPRIMER</button>
                            </span>
                        </div>
                        </form>
                        

                    </div>
            <?php
                }
            } else {
                echo "<div class='nk-tb-item'>No data found</div>";
            }
            ?>
            
        </div>
    </div><!-- .card -->
</div><!-- .col -->

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

</body>

</html>

<?php }  else {  
      header("Location: Error.php");
}
    
    ?>