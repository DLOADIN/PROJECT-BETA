<?php
$con=mysqli_connect('localhost','root','','competitorsystem');
$sql=mysqli_query($con,"SELECT u_companyname, u_marketvalue FROM competitorinfo") or die(mysqli_error($con));

$dataArray = array(); 

$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

while($result=mysqli_fetch_assoc($sql)){
    $companyname = $result['u_companyname'];
    $marketvalue = $result['u_marketvalue'];
    $futurePrices = array();
    foreach ($months as $month) {
        $randomMultiplier = mt_rand(20, 120) / 100;
        $futurePrices[] = $marketvalue * $randomMultiplier;
    }

    for ($i = 0; $i < count($months); $i++) {
        $dataArray[] = "['$companyname - $months[$i]', {$futurePrices[$i]}]";
    }
}
?>

<script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Company and Month', 'Future Company Worth Value'],
                <?php echo implode(",", $dataArray); ?>
            ]);

            var options = {
                title: 'Competitor Prices and Future Predictions',
                subtitle: 'Predicted Future Value of The selected Company for Each Month',
                hAxis: {title: 'Company and Month'},
                vAxis: {title: 'Future Worth Value'},
                legend: 'none',
                height:600,
                width:1220,
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
