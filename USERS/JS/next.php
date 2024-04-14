<?php
$con=mysqli_connect('localhost','root','','competitorsystem') or die(mysqli_error($con));
$db=mysqli_select_db($con,"competitorsystem") or die(mysqli_error($con));

$sql=mysqli_query($con,"SELECT u_productname, u_currentprice FROM customerinfo") or die(mysqli_error($con));

$dataArray = array(); // Initialize an empty array to store data

while($result=mysqli_fetch_assoc($sql)){
    $productName = $result['u_productname'];
    $currentPrice = $result['u_currentprice'];
    $dataArray[] = "['$productName', $currentPrice]"; // Push data into the array
}
?>

<script>
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['PRODUCT NAME', 'CURRENT PRICE'],
            <?php echo implode(",", $dataArray); ?> // Output data array as a comma-separated list
        ]);

        var options = {
            title: 'PRODUCT PRICES',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>