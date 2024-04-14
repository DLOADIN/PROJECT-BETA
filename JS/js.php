<?php
$con = mysqli_connect('localhost', 'root', '', 'competitorsystem') or die(mysqli_error($con));
$db = mysqli_select_db($con, "competitorsystem") or die(mysqli_error($con));

$sql = mysqli_query($con, "SELECT u_productname, u_currentprice FROM inputdata ORDER BY u_currentprice ASC") or die(mysqli_error($con));

$dataArray = array(); // Initialize an empty array to store data

while ($result = mysqli_fetch_assoc($sql)) {
    $productName = $result['u_productname'];
    $currentPrice = $result['u_currentprice'];
    // Default style for each row
    $dataArray[] = "['$productName', $currentPrice, 'blue']"; // Push data into the array
}
?>

<script>
google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Product Name", "Current Price", { role: "style" } ],
    <?php echo implode(",", $dataArray); ?> // Output data array as a comma-separated list
  ]);

  var view = new google.visualization.DataView(data);
  view.setColumns([0, 1,
                   { calc: "stringify",
                     sourceColumn: 1,
                     type: "string",
                     role: "annotation" },
                   2]);

  var options = {
    title: "PRODUCT EFFICIENCY",
    width: 600,
    height: 400,
    bar: {groupWidth: "60%"},
    legend: { position: "none" },
  };

  var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
  chart.draw(view, options);
}
</script>
