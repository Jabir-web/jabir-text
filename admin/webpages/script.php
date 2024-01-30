<!-- plugins:js -->
<script src="../vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../vendors/chart.js/Chart.min.js"></script>
<script src="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="../vendors/progressbar.js/progressbar.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../js/off-canvas.js"></script>
<script src="../js/hoverable-collapse.js"></script>
<script src="../js/template.js"></script>
<script src="../js/settings.js"></script>
<script src="../js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../js/jquery.cookie.js" type="text/javascript"></script>
<script src="../js/Chart.roundedBarCharts.js"></script>
<script src="../js/picshow.js"></script>


<?php

include "../logics/conn.php";

// queries
$jan="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'January' AND bill_user = '{$_SESSION["adminid"]}'";
$feb="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'February' AND bill_user = '{$_SESSION["adminid"]}'";
$mar="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'March' AND bill_user = '{$_SESSION["adminid"]}'";
$apr="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'April' AND bill_user = '{$_SESSION["adminid"]}'";
$may="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'May' AND bill_user = '{$_SESSION["adminid"]}'";
$jun="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'Jun' AND bill_user = '{$_SESSION["adminid"]}'";
$jul="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'July' AND bill_user = '{$_SESSION["adminid"]}'";
$aug="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'August' AND bill_user = '{$_SESSION["adminid"]}'";
$sep="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'September' AND bill_user = '{$_SESSION["adminid"]}'";
$oct="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'October' AND bill_user = '{$_SESSION["adminid"]}'";
$nov="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'November' AND bill_user = '{$_SESSION["adminid"]}'";
$dec="SELECT SUM(bill_amount) FROM billing WHERE bill_month = 'December' AND bill_user = '{$_SESSION["adminid"]}'";


$janquery=mysqli_query($connection,$jan);
$febquery=mysqli_query($connection,$feb);
$marquery=mysqli_query($connection,$mar);
$aprquery=mysqli_query($connection,$apr);
$mayquery=mysqli_query($connection,$may);
$junquery=mysqli_query($connection,$jun);
$julquery=mysqli_query($connection,$jul);
$augquery=mysqli_query($connection,$aug);
$sepquery=mysqli_query($connection,$sep);
$octquery=mysqli_query($connection,$oct);
$novquery=mysqli_query($connection,$nov);
$decquery=mysqli_query($connection,$dec);

$jandata=mysqli_fetch_assoc($janquery);
$febdata=mysqli_fetch_assoc($febquery);
$mardata=mysqli_fetch_assoc($marquery);
$aprdata=mysqli_fetch_assoc($aprquery);
$maydata=mysqli_fetch_assoc($mayquery);
$jundata=mysqli_fetch_assoc($junquery);
$juldata=mysqli_fetch_assoc($julquery);
$augdata=mysqli_fetch_assoc($augquery);
$sepdata=mysqli_fetch_assoc($sepquery);
$octdata=mysqli_fetch_assoc($octquery);
$novdata=mysqli_fetch_assoc($novquery);
$decdata=mysqli_fetch_assoc($decquery);




$thisyear = array($jandata['SUM(bill_amount)'], $febdata['SUM(bill_amount)'], $mardata['SUM(bill_amount)'], $aprdata['SUM(bill_amount)'], $maydata['SUM(bill_amount)'], $jundata['SUM(bill_amount)'], $juldata['SUM(bill_amount)'], $augdata['SUM(bill_amount)'], $sepdata['SUM(bill_amount)'], $octdata['SUM(bill_amount)'], $novdata['SUM(bill_amount)'],$decdata['SUM(bill_amount)']);
$lastyear = array(22000, 40000, 45000, 55000, 65000, 45000, 96000, 75000, 54000, 55000, 20000, 120000);

$convertthis = json_encode($thisyear);
$convertlast = json_encode($lastyear);

echo " <script>var ty=" . $convertthis . " </script>";
echo " <script>var ly=" . $convertlast . " </script>";



?>

<script>
  console.log(ly)
  if ($("#marketingOverview").length) {

    var marketingOverviewChart = document.getElementById("marketingOverview").getContext('2d');
    var marketingOverviewData = {
      labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
      datasets: [{
        label: 'Last Year 2023',
        data: ly,
        backgroundColor: "#4F1CB2",
        borderColor: [
          '#4F1CB2',
        ],
        borderWidth: 0,
        fill: true, // 3: no fill

      }, {
        label: 'This Year 2024',
        data: ty,
        backgroundColor: "#C51383",
        borderColor: [
          '#C51383',
        ],
        borderWidth: 0,
        fill: true, // 3: no fill
      }]
    };

    var marketingOverviewOptions = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          gridLines: {
            display: true,
            drawBorder: false,
            color: "#F0F0F0",
            zeroLineColor: '#F0F0F0',
          },
          ticks: {
            beginAtZero: true,
            autoSkip: true,
            maxTicksLimit: 10,
            fontSize: 10,
            color: "#6B778C"
          }
        }],
        xAxes: [{
          stacked: true,
          barPercentage: 0.45,
          gridLines: {
            display: false,
            drawBorder: false,
          },
          ticks: {
            beginAtZero: false,
            autoSkip: true,
            maxTicksLimit: 12,
            fontSize: 10,
            color: "#6B778C"
          }
        }],
      },
      legend: false,
      legendCallback: function (chart) {
        var text = [];
        text.push('<div class="chartjs-legend"><ul>');
        for (var i = 0; i < chart.data.datasets.length; i++) {
          console.log(chart.data.datasets[i]); // see what's inside the obj.
          text.push('<li class="text-muted text-small">');
          text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
          text.push(chart.data.datasets[i].label);
          text.push('</li>');
        }
        text.push('</ul></div>');
        return text.join("");
      },

      elements: {
        line: {
          tension: 0.8,
        }
      },
      tooltips: {
        backgroundColor: 'rgba(31, 59, 179, 1)',
      }
    }
    var marketingOverview = new Chart(marketingOverviewChart, {
      type: 'bar',
      data: marketingOverviewData,
      options: marketingOverviewOptions
    });
    document.getElementById('marketing-overview-legend').innerHTML = marketingOverview.generateLegend();
  }
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
  integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="../js/dashboard.js"></script> -->
<script src="../js/customs.js"></script>
<script src="../js/inserts.js"></script>