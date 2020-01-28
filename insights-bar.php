<?php
 $connect = mysqli_connect("localhost", "root", "", "trafficcop");
 $query = "SELECT insuaranceCompany,vehicleType, count(*) as number FROM accidentsofusers GROUP BY insuaranceCompany";
 $result = mysqli_query($connect, $query);
 ?>
 <!DOCTYPE html>
 <html>
      <head>

          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
           <script type="text/javascript">
           google.charts.load('current', {packages: ['corechart', 'bar']});
          google.charts.setOnLoadCallback(drawBarColors);
           function drawBarColors()
           {
                var data = google.visualization.arrayToDataTable([
                          ['Insurance company' ,  'Number'],
                          <?php
                          while($row = mysqli_fetch_array($result))
                          {
                               echo "['".$row["insuaranceCompany"]."', ".$row["number"]."],";
                          }
                          ?>
                     ]);
                     var options = {
               title: 'Vehicle insurance by company',
               chartArea: {width: '50%'},
               colors: ['#b0120a', '#ffab91'],
               hAxis: {
                 title: 'Is',
                 minValue: 0
               },
               vAxis: {
                 title: 'Company'
               }
             };
             var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
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
                <div class="column" id="chart_div" style="width:100%;height:85vh"></div>

      </body>
 </html>
