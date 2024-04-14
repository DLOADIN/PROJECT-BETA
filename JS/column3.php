<?php
$con = mysqli_connect('localhost', 'root', '', 'competitorsystem') or die(mysqli_error($con));
$db = mysqli_select_db($con, "competitorsystem") or die(mysqli_error($con));

// Check if a product is selected
if (isset($_GET['product'])) {
    $selectedProduct = $_GET['product'];
    $sql = mysqli_query($con, "SELECT u_productname, u_currentprice FROM customerinfo WHERE u_productname = '$selectedProduct'") or die(mysqli_error($con));
} else {
    $sql = mysqli_query($con, "SELECT u_productname, u_currentprice FROM customerinfo") or die(mysqli_error($con));
}

$dataArray = array(); // Initialize an empty array to store data

// Define an array of months in order
$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

while ($result = mysqli_fetch_assoc($sql)) {
    $productName = $result['u_productname'];
    $currentPrice = $result['u_currentprice'];

    // Generate random future prices for each month
    $futurePrices = array();
    foreach ($months as $month) {
        $randomMultiplier = mt_rand(20, 120) / 100;
        $futurePrices[] = $currentPrice * $randomMultiplier;
    }

    // Add data for each month to the array
    for ($i = 0; $i < count($months); $i++) {
        $dataArray[] = "['$productName - $months[$i]', {$futurePrices[$i]}]";
    }
}
?>

<script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Product and Month');
        data.addColumn('number', 'Future Price');

        data.addRows([
            <?php echo implode(",", $dataArray); ?> // Output data array as a comma-separated list
        ]);

        var options = {
            chart: {
                title: 'Product Prices and Future Predictions',
                subtitle: 'Predicted Future Prices for Each Month',
            },
            bars: 'vertical',
            hAxis: { title: 'Months' },
            height: 400,
            colors: ['#1b9e77', '#d95f02'],
            padding:10,
        };

        var chart = new google.charts.Bar(document.getElementById('barchart'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
