

Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
        labels: <? php echo json_encode($MCInvolvement); ?>,
    // labels: ["Not Needed", "Called, arrived in timely manner", "Called, arrived late", "Called, no show", "Called, discussed, no response needed"],
    datasets: [{
        data:<? php echo json_encode($Count); ?>,
        backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#9932cc'],
    }],
  },
});




/*<? php
                                        $Query = "select * from Incidents";
$Result = @mysqli_query($DBConnect, $Query);
if (mysqli_num_rows($Result) > 0) {
    while (($Row = mysqli_fetch_assoc($Result)) == true) {
        $MCInvolvement = $Row['MCInvolvement'];
    }
}
                                        ?>
//data:<?php echo json_encode ($MCInvolvement);?>,*/
