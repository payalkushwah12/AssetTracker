@extends('master')
@section('content')
<!-- pie chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart()
  {
    var data = google.visualization.arrayToDataTable([
        ['Assets', 'No. of assests'],
         <?php echo $chartdata ?>
        ]);
    var options = {
        title: 'Asset types'
        };
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
</script>

<!-- bar chart -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() 
  {
    var data = google.visualization.arrayToDataTable([
      ['Asset', 'Status', { role: 'style' }],
      ['Active', <?php echo $active; ?>, 'color: green' ],
      ['Not Active',<?php echo $notactive; ?>, 'color:blue' ],
    ]);

    var options = {
      chart: {
        title: 'Assets Status',
      },
        bars: 'vertical' // Required for Material Bar Charts.
      };

    var chart = new google.charts.Bar(document.getElementById('barchart_material'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<div class="container" id="piechart"></div>
<div class="container">
  <div class="container float-right" id="barchart_material" style="width: 510px; height: 490px;">
  </div>
</div> 
@endsection



  