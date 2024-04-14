<?php 
$con=mysqli_connect('localhost','root','','competitorsystem') or die(mysqli_error($con));
$db=mysqli_select_db($con,"competitorsystem") or die(mysqli_error($con));

$sql=mysqli_query($con,"SELECT u_companyname, u_marketvalue, u_marketprice FROM competitorinfo ORDER BY u_companyname ASC") or die(mysqli_error($con));

$dataArray = array(); // Initialize an empty array to store data

while($result=mysqli_fetch_assoc($sql)){
    $companyName = $result['u_companyname'];
    $marketValue = $result['u_marketvalue'];
    $marketPrice = $result['u_marketprice'];
    $dataArray[] = "['$companyName', $marketValue, $marketPrice]"; // Push data into the array
}
?>
<script>
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {


  var data = google.visualization.arrayToDataTable([
  ['COMPANY NAME', 'MARKET VALUE', 'MARKET PRICE'],
  <?php echo implode(",", $dataArray); ?> // Output data array as a comma-separated list
  ]);

  var options = {
    chart: {
      title: 'COMPETITOR PERFORMANCE',
      subtitle: 'SALES, PROFIT',
    }
  };

  var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

  chart.draw(data, google.charts.Bar.convertOptions(options));
}
</script>
