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



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get count of entraineurs
$sqlEntraineur = "SELECT COUNT(*) AS countEntraineur FROM entraineur";
$resultEntraineur = $conn->query($sqlEntraineur);
$totalentraineur = $resultEntraineur->fetch_assoc()['countEntraineur'];

// Query to get total revenue from Montant field in adherent table
$sqlRevenue = "SELECT SUM(Montant) AS totalRevenue FROM adhérent";
$resultRevenue = $conn->query($sqlRevenue);
$Revenue = $resultRevenue->fetch_assoc()['totalRevenue'];

// Query to get count of adherents from mat table
$sqlAdherent = "SELECT COUNT(*) AS countAdherent FROM adhérent";
$resultAdherent = $conn->query($sqlAdherent);
$Adhérent = $resultAdherent->fetch_assoc()['countAdherent'];

// Query to get count of adherents from mat table
$SqlAssurance= "SELECT COUNT(Assurance) AS countAssurance FROM adhérent WHERE Assurance='Valider'";
$ResultAssurance = $conn->query($SqlAssurance);
$AssuranceAdhérent = $ResultAssurance->fetch_assoc()['countAssurance'];

// Query to get count of adherents from mat table
$SqlTransport= "SELECT COUNT(Transport) AS countTransport FROM adhérent WHERE Transport='Oui'";
$ResultTransport = $conn->query($SqlTransport);
$TransportAdhérent = $ResultTransport->fetch_assoc()['countTransport'];

// Query to get count of adherents from mat table
$SqlNonTransport= "SELECT COUNT(Transport) AS countNonTransport FROM adhérent WHERE Transport='Non'";
$ResultNonTransport = $conn->query($SqlNonTransport);
$TransportNonAdhérent = $ResultNonTransport->fetch_assoc()['countNonTransport'];

        // Query to get total revenue
$sqlStaff = "SELECT COUNT(*) AS totalstaff FROM Staff";
$resultStaff = $conn->query($sqlStaff);
$staff = $resultStaff->fetch_assoc()['totalstaff'];

// Query to fetch data from the adherent table
$sql = "SELECT * FROM adhérent";
$result = $conn->query($sql);

$totalPersonnel = $totalentraineur+$Adhérent+$staff;
$PoucentageEntraineur = number_format(($totalentraineur/$totalPersonnel) * 100,2);
$PoucentageAdhérent = number_format(($Adhérent/$totalPersonnel) * 100,2);
$PoucentageStaff= number_format(($staff/$totalPersonnel) * 100,2);


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
    <title>Revenus</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/css/dashlite.css?ver=2.4.0">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css?ver=2.4.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="nk-body ui-rounder npc-default has-sidebar ">

    <!-- app-root  -->
    <div class="nk-app-root">
        <div class="nk-sidebar" data-content="sidebarMenu">
            <div class="nk-sidebar-bar">
                <div class="nk-apps-brand">
                    <a href="html/index.html" class="logo-link">
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
                        <h5 class="title">Consulter Statistiques</h5>
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

                            <?php   } elseif($position == "Comptabilité") { ?>
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


                <!-- content  -->
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Dashboard</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Dashboard Revenues.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                      
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">

                                        <div class="col-xxl-3 col-md-6">
                                            <div class="card card-full overflow-hidden">
                                                <div class="nk-ecwg nk-ecwg7 h-100">
                                                    <div class="card-inner flex-grow-1">
                                                        <div class="card-title-group mb-4">
                                                            <div class="card-title">
                                                                <h6 class="title">Distribution des Effectifs</h6>
                                                            </div>
                                                        </div>
                                                        <canvas class="ecommerce-doughnut-s1" id="myPieChart"></canvas>

                                                        <ul class="nk-ecwg7-legends">
                                                            <li>
                                                                <div class="title">
                                                                    <span class="dot dot-lg sq" data-bg="rgba(54, 162, 235, 0.2)"></span>
                                                                    <span><?php echo $PoucentageEntraineur."%"; ?></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">
                                                                    <span class="dot dot-lg sq" data-bg="rgba(255, 206, 86, 0.2)"></span>
                                                                    <span><?php echo $PoucentageStaff."%"; ?></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">
                                                                    <span class="dot dot-lg sq" data-bg="rgba(255, 99, 71, 1)"></span>
                                                                    <span><?php echo $PoucentageAdhérent."%"; ?></span>

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div><!-- .card-inner -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                        <div class="col-xxl-3 col-md-6">
                                            <div class="card h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group mb-2">
                                                        <div class="card-title">
                                                            <h6 class="title">Adhérents et Bénéfices</h6>
                                                        </div>
                                                    </div>
                                                    <ul class="nk-store-statistics">
                                                        <li class="item">
                                                            <div class="info">
                                                                <div class="title">Adhérent</div>
                                                                <div class="count"><?php echo $Adhérent; ?></div>
                                                            </div>
                                                            <em class="icon bg-info-dim ni ni-users"></em>
                                                        </li>

                                                        <li class="item">
                                                            <div class="info">
                                                                <div class="title">Bénifice d'assurance</div>
                                                                <div class="count"><?php echo $AssuranceAdhérent; ?>
                                                                </div>
                                                            </div>
                                                            <em class="icon bg-primary-dim ni ni-bag"></em>
                                                        </li>
                                                        
                                                
                                                        <li class="item">
                                                            <div class="info">
                                                                <div class="title">Bénifice de transport</div>
                                                                <div class="count"><?php echo $TransportAdhérent; ?></div>
                                                            </div>
                                                            <em class="icon bg-purple-dim ni ni-server"></em>
                                                        </li>

                                                        <li class="item">
                                                            <div class="info">
                                                                <div class="title">Non Bénifice de transport</div>
                                                                <div class="count"><?php echo $TransportNonAdhérent; ?></div>
                                                            </div>
                                                            <em class="icon bg-pink-dim ni ni-box"></em>
                                                        </li>
                                                    </ul>
                                                </div><!-- .card-inner -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                                     <!-- .col -->
                                                     <div class="col-xxl-3 col-sm-12">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Revenu Total</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">
                                                                <?php echo $Revenue; ?>
                                                                </div>
                                                                <div class="nk-ecwg6-ck">
                                                                    <canvas class="ecommerce-line-chart-s3" id="todayRevenue"></canvas>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="info"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>2.34%</span><span> vs. last week</span></div> -->
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        

                                        <div class="col-xxl-6">
                                            <div class="card card-full">
                                                <div class="nk-ecwg nk-ecwg8 h-100">
                                                    <div class="card-inner">
                                                        <div class="card-title-group mb-3">
                                                            <div class="card-title">
                                                                <h6 class="title">Revenu total par an</h6>
                                                            </div>
                                                           
                                                        </div>
                                                            <canvas id="myChart" width="300" height="100"></canvas>                                                        
                                                        </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->



                          


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
                <div class="nk-tb-col"><span class="d-none d-sm-inline">Assurance</span></div>
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
                                    echo "Formation";
                                } else {
                                    echo "Unknown"; 
                                } ?>
                            </span>
                        </div>

                        <div class="nk-tb-col">
                            <span class="badge badge-dot badge-dot-xs badge-success">
                            <?php   if ($row["Assurance"] == "Valider") {
                                    echo "Inclu";
                                } elseif ($row["Assurance"] == "NonValider") {
                                    echo "Non Inclu";
                                } ?>
                            </span>
                        </div>
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

<?php
// Close connection
$conn->close();
?>      
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
</div>
<!-- end content  -->

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
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const countEntraineur = <?php echo $totalentraineur; ?>;
        const countAdherent = <?php echo $Adhérent; ?>;
        const totalStaff = <?php echo $staff; ?>;
        
        const ctx = document.getElementById('myPieChart').getContext('2d');
        
        const data = {
            labels: ['Entraineurs', 'Adhérent', 'Staff'],
            datasets: [{
                label: 'Entraineurs and Revenue and Staff',
                data: [countEntraineur, countAdherent, totalStaff],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)', // Blue
                    'rgba(255, 206, 86, 0.2)',  // Yellow
                    'rgba(255, 99, 71, 0.2)',   // Red
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 71, 1)',
                ],
                borderWidth: 1
            }]
        };
        
        const config = {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Entraineurs and Revenue Chart'
                    }
                }
            }
        };
        
        const myPieChart = new Chart(ctx, config);
    });
    </script>

<script>
        // Embed PHP data directly into JavaScript
        <?php
        include 'db_connect.php';

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to count entries grouped by year
        $sql = "SELECT YEAR(created_date) as year, Sum(Montant) as count FROM adhérent GROUP BY YEAR(created_date)";
        $result = $conn->query($sql);

        $data = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        $conn->close();
        ?>

        // Convert PHP array to JavaScript array
        const data = <?php echo json_encode($data); ?>;

        // Extract years and counts from the data
        let years = data.map(item => item.year);
        let counts = data.map(item => item.count);

        // Create the chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: years,
                datasets: [{
                    label: 'Revenu total par an',
                    data: counts,
                    backgroundColor: 'rgba(0, 255, 0, 0.2)',
                    borderColor: 'rgba(0, 255, 0, 1)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
<?php }  else {  
      header("Location: Error.php");
}
    
    ?>