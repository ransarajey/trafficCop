<?php
 $connect = mysqli_connect("localhost", "root", "", "trafficcop");
 $query = "SELECT vehicleType, count(*) as number FROM accidentsofusers GROUP BY vehicleType";
 $result = mysqli_query($connect, $query);
 ?>
 <!DOCTYPE html>
 <html>
      <head>

           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
           <script type="text/javascript">
           google.charts.load('current', {'packages':['corechart']});
           google.charts.setOnLoadCallback(drawChart);
           function drawChart()
           {
                var data = google.visualization.arrayToDataTable([
                          ['Vehicle Type', 'Number'],
                          <?php
                          while($row = mysqli_fetch_array($result))
                          {
                               echo "['".$row["vehicleType"]."', ".$row["number"]."],";
                          }
                          ?>
                     ]);
                var options = {
                      title: 'Percentage of Vehicle types',
                      is3D:true,
                      pieHole: 0.4
                     };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
           }
           </script>

        

           <style>
           .column {
         float: left;
         width: 50%;
       }

       /* Clear floats after the columns */
       .row:after {
         content: "";
         display: table;
         clear: both;
       }
     </style>

      </head>
      <body>
                <div class="column" id="piechart" style="width:100%;height:85vh"></div>

      </body>
 </html>
