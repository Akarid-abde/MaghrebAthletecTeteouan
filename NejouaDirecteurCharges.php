<?php
session_start();
include 'db_connect.php';

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $Nom = $_SESSION["Nom"];
    $position = $_SESSION["Position"];
}else{  header("Location: index.php");  }

// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

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
$SqlAssurance= "SELECT COUNT(Transport) AS countTransport FROM adhérent WHERE Transport='Oui'";
$ResultAssurance = $conn->query($SqlAssurance);
$TransportAdhérent = $ResultAssurance->fetch_assoc()['countTransport'];

// Initialize $meta to 0
$meta = 0;

// Query to get count of adherents from mat table
$SqlTotal= "SELECT SUM(PrixMateriaux + Transport + Assurance) AS total_all FROM charges";
$ResultTotal = $conn->query($SqlTotal);
$meta = $ResultTotal->fetch_assoc()['total_all'];

$sql = "SELECT * FROM charges";
$result = $conn->query($sql);


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
                                                <p>Les Charges</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                    
                                                        <li class="nk-block-tools-opt"><a href="Charges.php" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Add Charge</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                      
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">

                                        <div class="col-xxl-3 col-sm-12">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Charges </h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">
                                                                <?php echo $totalentraineur * 4000 + $meta; ?>
                                                                </div>
                                                                <div class="nk-ecwg6-ck">
                                                                    <canvas class="ecommerce-line-chart-s3" id="todayVisitors"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                           
                                                           
                                        

                                        <div class="col-xxl-3 col-md-6">
                                            <div class="card card-full overflow-hidden">
                                                <div class="nk-ecwg nk-ecwg7 h-100">
                                                    <div class="card-inner flex-grow-1">
                                                        <div class="card-title-group mb-4">
                                                            <div class="card-title">
                                                                <h6 class="title">Les charges Totale Par mois</h6>
                                                            </div>
                                                        </div>
                                                        <canvas id="horizontalBarChart" width="200" height="100"></canvas>

                                                    </div><!-- .card-inner -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                        <div class="col-xxl-3 col-md-6">
                                            <div class="card card-full overflow-hidden">
                                                <div class="nk-ecwg nk-ecwg7 h-100">
                                                    <div class="card-inner flex-grow-1">
                                                        <div class="card-title-group mb-4">
                                                            <div class="card-title">
                                                                <h6 class="title">Les charges des matériels par mois</h6>
                                                            </div>
                                                        </div>
                                                        <canvas id="prixMateriauxChart" width="200" height="100"></canvas>

                                                    
                                                    </div><!-- .card-inner -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                        <div class="col-xxl-3 col-md-6">
                                            <div class="card card-full overflow-hidden">
                                                <div class="nk-ecwg nk-ecwg7 h-100">
                                                    <div class="card-inner flex-grow-1">
                                                        <div class="card-title-group mb-4">
                                                            <div class="card-title">
                                                                <h6 class="title">Assurance Par Mois</h6>
                                                            </div>
                                                        </div>
                                                        <canvas id="assuranceChart" width="400" height="200"></canvas>

                                                    
                                                    </div><!-- .card-inner -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                        <div class="col-xxl-3 col-md-6">
                                            <div class="card card-full overflow-hidden">
                                                <div class="nk-ecwg nk-ecwg7 h-100">
                                                    <div class="card-inner flex-grow-1">
                                                        <div class="card-title-group mb-4">
                                                            <div class="card-title">
                                                                <h6 class="title">transport par mois</h6>
                                                            </div>
                                                        </div>
                                                        <canvas id="transportChart" width="400" height="200"></canvas>

                                                    
                                                    </div><!-- .card-inner -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->


<div class="col-xxl-8">
    <div class="card card-full">
        <div class="card-inner">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Charges</h6>
                </div>
            </div>
        </div>
        <div class="nk-tb-list mt-n2">
            <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col"><span>ID Charge.</span></div>
                <div class="nk-tb-col tb-col-sm"><span>Materielle</span></div>
                <div class="nk-tb-col tb-col-sm"><span>Transport</span></div>
                <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                <div class="nk-tb-col"><span>Année</span></div>
                <div class="nk-tb-col"><span class="d-none d-sm-inline">Mois</span></div>
            </div>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">
                                    <?php echo $row["IdCharge"]; ?>
                                </a></span>
                        </div>

                        <div class="nk-tb-col tb-col-sm">
                            <div class="user-card">
                                <div class="user-avatar sm bg-purple-dim">
                                    <span></span>
                                </div>
                                <div class="user-name">
                                    <span class="tb-lead">
                                        <?php echo $row["PrixMateriaux"]; ?>
                                        <span>DH</span>
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
                                        <?php echo $row["Transport"]; ?>
                                        <span>DH</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    

                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">
                                <?php echo $row["created_date"]; ?>
                                
                            </span>
                        </div>

                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">
                                <?php echo  date("Y", strtotime($row["created_date"])); ?>
                                
                            </span>
                        </div>

                        <div class="nk-tb-col">
                            <span class="tb-sub tb-amount">
                                <?php echo  date("M", strtotime($row["created_date"])); ?>
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
        <?php
        include 'db_connect.php';

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get the sum of columns grouped by year and month
        $sql = "SELECT 
                    DATE_FORMAT(created_date, '%Y-%m') as yearmonth, 
                    SUM(PrixMateriaux) as sumPrixMateriaux, 
                    SUM(Transport) as sumTransport, 
                    SUM(Assurance) as sumAssurance
                FROM charges 
                GROUP BY yearmonth";
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

        // Extract yearmonth and sums from the data
        let yearMonths = data.map(item => item.yearmonth);
        let sumPrixMateriaux = data.map(item => item.sumPrixMateriaux);
        let sumTransport = data.map(item => item.sumTransport);
        let sumAssurance = data.map(item => item.sumAssurance);

       // Create the PrixMateriaux chart with a new design (doughnut chart)
       const ctx1 = document.getElementById('prixMateriauxChart').getContext('2d');
        const prixMateriauxChart = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: yearMonths,
                datasets: [{
                    label: 'Les Charges De matériaux par mois (DH)',
                    data: sumPrixMateriaux,
                    backgroundColor: yearMonths.map(() => 'rgba(255, 99, 132, 0.2)'),
                    borderColor: yearMonths.map(() => 'rgba(255, 99, 132, 1)'),
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Sum: ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        // Create the Transport chart
        const ctx2 = document.getElementById('transportChart').getContext('2d');
        const transportChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: yearMonths,
                datasets: [{
                    label: 'Les Charges De Transport Par Mois (DH)',
                    data: sumTransport,
                    backgroundColor: 'rgba(0, 0, 255, 0.2)',
                    borderColor: 'rgba(0, 0, 255, 1)',
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

        // Create the Assurance chart
        const ctx3 = document.getElementById('assuranceChart').getContext('2d');
        const assuranceChart = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: yearMonths,
                datasets: [{
                    label: 'Les Charges D\'Assurance Par Mois (DH)',
                    data: sumAssurance,
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

<script>
        <?php

// Connect to your database
include 'db_connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get sum of all three columns grouped by created_date (year and month)
$sql = "SELECT YEAR(created_date) AS year, MONTH(created_date) AS month,
               SUM(PrixMateriaux + Transport + Assurance) AS total_all
        FROM charges
        GROUP BY YEAR(created_date), MONTH(created_date)";

$result = $conn->query($sql);

// Format data for Chart.js
$chart_data = [];
while ($row = $result->fetch_assoc()) {
    $date = $row['year'] . "-" . str_pad($row['month'], 2, '0', STR_PAD_LEFT);
    $chart_data[] = [
        'date' => $date,
        'total_all' => $row['total_all']
    ];
}


// Close database connection
$conn->close();

// Convert data to JSON format for use in JavaScript
$chart_data_json = json_encode($chart_data);

?>
        // Parse the PHP-generated JSON data
var chartData = <?php echo $chart_data_json; ?>;

// Extract labels and data
var labels = chartData.map(item => item.date);
var totalAll = chartData.map(item => item.total_all);

// Create the chart
var ctx = document.getElementById('horizontalBarChart').getContext('2d');
var horizontalBarChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total All (PrixMateriaux + Transport + Assurance)',
            backgroundColor: 'rgba(255, 255, 20, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
            data: totalAll
        }]
    },
    options: {
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
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