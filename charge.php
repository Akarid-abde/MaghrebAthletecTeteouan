
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizontal Bar Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="horizontalBarChart"></canvas>

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
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
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
