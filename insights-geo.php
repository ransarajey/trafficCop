<?php
 $connect = mysqli_connect("localhost", "root", "", "trafficcop");
 $query = "SELECT lat, lng, description FROM accidentsofusers";
 $result = mysqli_query($connect, $query);
 ?>

<html>
  <head>
    <script src="https://www.google.com/jsapi?fake=.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.load('visualization', '1', {'packages': ['geochart']});
google.setOnLoadCallback(drawVisualization);

  function drawVisualization() {var data = new google.visualization.DataTable();

 data.addColumn('number', 'Lat');
 data.addColumn('number', 'Long');
 data.addColumn('number', 'Value');
 data.addColumn({type:'string', role:'tooltip'});

 <?php
 while($row = mysqli_fetch_array($result))
 {
      echo "data.addRows([[".$row["lat"].",".$row["lng"].",0,'']]);";
 }
 ?>

/*data.addRows([[6.944310925890721,79.93999257202154,0,'tooltip']]);
data.addRows([[6.904614047238084,79.90974426269531,0,'tooltip']]);*/


 var options = {
 colorAxis:  {minValue: 0, maxValue: 0,  colors: ['#6699CC']},
 legend: 'none',

 backgroundColor: {fill:'transparent',stroke:'#FFF' ,strokeWidth:0 },
 datalessRegionColor: '#f5f5f5',
 displayMode: 'markers',
 enableRegionInteractivity: 'true',
 resolution: 'provinces',
 sizeAxis: {minValue: 1, maxValue:1,minSize:5,  maxSize: 5},
 region:'LK',
 keepAspectRatio: true,
 width:800,
 height:600,
 tooltip: {textStyle: {color: '#444444'}}
 };
  var chart = new   google.visualization.GeoChart(document.getElementById('visualization'));



 chart.draw(data, options);


 }
    </script>
  </head>
  <body>
    <div id="visualization"></div>
  </body>
</html>
