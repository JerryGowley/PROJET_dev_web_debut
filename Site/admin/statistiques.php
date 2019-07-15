<?php
include ('../header.php');
?>
<!DOCTYPE HTML>
<html>
<head>
  <style>
  .grid-container {
    display: grid;
    grid-template-columns: auto auto auto;
  }
</style>
    </head>
    <body>
      <br>
      <a class="btn btn-primary" href="index_adm.php" role="button">Retour a l'accueil</a>
      <br><br>
<form method="POST" action="statistiques.php">
  <input type="date" name="Date_Ant" value="2019-06-24">
  <input type="date" name="Date_Post" value="2019-06-25">
  <input type="submit">
</form>
<br><br>
<?php
$date_ant ="";
$date_post ="";
if (isset($_POST['Date_Ant']) && isset($_POST['Date_Post']))
{
  $date_ant = $_POST['Date_Ant'];
  $date_post = $_POST['Date_Post'];
}

$sql = "SELECT Logiciel, COUNT(*) as nb_logiciel FROM ticket GROUP BY Logiciel";
$sql2 ="SELECT Date_ouverture, COUNT(*) as nb_ticket FROM `ticket` WHERE Date_ouverture BETWEEN '". $date_ant ."' AND '". $date_post ."' GROUP BY Date_ouverture";
$sql3 ="SELECT Technicien, COUNT(*) as nb_ticket FROM ticket WHERE Date_ouverture BETWEEN '". $date_ant ."' AND '". $date_post ."' GROUP BY Technicien;";


$sth = $conexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth2 = $conexion->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth3 = $conexion->prepare($sql3, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

$sth->execute();
$sth2->execute();
$sth3->execute();

$dataPoints=array(array());
$dataPoints2=array(array());
$dataPoints3=array(array());

$i = 0;
foreach($sth3->fetchAll(PDO::FETCH_OBJ) as $row)
  {
    $dataPoints3[$i] = array("y" => $row->nb_ticket, "label" => $row->Technicien);
    $i++;
  }
  $i = 0;
  foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row)
    {
      $dataPoints[$i] = array("label" => $row->Logiciel, "symbol" => $row->Logiciel,"y" => $row->nb_logiciel);
      $i++;
    }
    $i = 0;
    foreach($sth2->fetchAll(PDO::FETCH_OBJ) as $row)
      {
        $dataPoints2[$i] = array("y" => $row->nb_ticket, "label" => $row->Date_ouverture);
        $i++;
      }
      ?>

      <script>
        window.onload = function() {
          var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,
            title: {
              text: "Logiciel"
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
              text: "Nombre de ticket entre le <?php echo $_POST['Date_Ant'] . " et le " . $_POST['Date_Post'] ;?>"
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

          var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            theme: "light2",
            title:{
              text: "Nombre de ticket entre le <?php echo $_POST['Date_Ant'] . " et le " . $_POST['Date_Post'] ;?> par technicien"
            },
            axisY: {
              title: "Nombre de ticket"
            },
            data: [{
              type: "column",
              yValueFormatString: "# tickets",
              dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
            }]
          });
          chart3.render();

        }
      </script>
      <div class="grid-container">
        <div class="grid-item" id="chartContainer" style="height: 500px;"></div>
        <div class="grid-item" id="chartContainer2" style="height: 500px;"></div>
        <div class="grid-item" id="chartContainer3" style="height: 500px;"></div>
      </div>
      <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>        <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    </body>
    </html>
