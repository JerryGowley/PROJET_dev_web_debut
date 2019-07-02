<?php
  include ('conn_db.php');

  $sql = "SELECT type as type_salle, COUNT(*) as nb_type FROM salle GROUP BY type";
  $sql2 ="SELECT Date_ouverture, COUNT(*) as nb_ticket FROM `ticket` WHERE Date_ouverture <> '' GROUP BY Date_ouverture";

  $sth = $conexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth2 = $conexion->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

  $sth->execute();
  $sth2->execute();

  $dataPoints=array(array());
  $dataPoints2=array(array());

  $i = 0;
      foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row)
      {
          $dataPoints[$i] = array("label" => $row->type_salle, "symbol" => $row->type_salle,"y" => $row->nb_type);
          $i++;
      }
  $i = 0;
    foreach($sth2->fetchAll(PDO::FETCH_OBJ) as $row)
      {
          $dataPoints2[$i] = array("y" => $row->nb_ticket, "label" => $row->Date_ouverture);
          $i++;
      }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Stat</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script>
  window.onload = function() {
   
  var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light2",
    animationEnabled: true,
    title: {
      text: "Type de salle"
    },
    data: [{
      type: "doughnut",
      indexLabel: "{symbol} - {y}",
      yValueFormatString: "#,##0\"\"",
      showInLegend: true,
      legendText: "{label} : {y}",
      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
  });
  chart.render();

  var chart2 = new CanvasJS.Chart("chartContainer2", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Nombre de ticket par jours"
  },
  axisY: {
    title: "Nombre de ticket"
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0.## tickets",
    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
  }]
});
chart2.render();
   
  }
  </script>

</head>
<body>
  <div>
    <div class="row">
      <div class="col" id="chartContainer" style="height: 370px; width: 0%;"></div>
      <div class="col" id="chartContainer2" style="height: 370px; width: 0%;"></div>
    </div>
  </div>

  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>

</body>
</html>
<?php

?>