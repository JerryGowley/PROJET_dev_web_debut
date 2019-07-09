<!DOCTYPE html>
<html>
<head>
  <?php include('./ScriptPHP/verif.php'); ?>

  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Tickets</title>
  <link rel="stylesheet" media="screen" href="../css/SiteAppli.css">
  <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<script>
window.console = window.console || function(t) {};
if (document.location.search.match(/type=embed/gi)) {
  window.parent.postMessage("resize", "*");
}
</script>
<body>
  <?php error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
  ?>
  <div class="container">
    <br><br>
    <a class="btn btn-primary" href="index_adm.php" role="button">Retour a l'accueil</a>
    <br><br><br><br><br><br><br>
    <table class="table table-bordered table-condensed table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">id</th>
          <th scope="col">Logiciel</th>
          <th scope="col">Titre_PRB</th>
          <th scope="col">Etat</th>
          <th scope="col">Client</th>
          <th scope="col">Technicien</th>
          <th scope="col">Description</th>
          <th scope="col">Date d'ouverture</th>
          <th scope="col">Date de fermeture</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include ('../conn_db.php');
        $sql = "SELECT * FROM Ticket";
        $sth = $conexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row)
        {
          ?>
          <tr class="table-row" data-href="ticket.php?id=<?php echo $row->id ?>">
            <?php
            echo "<th>" . $row->id . "</th>";
            echo "<td>" . $row->Logiciel."</td>";
            echo "<td>" . $row->Titre_PRB . "</td>";
            echo "<td>" . $row->Etat . "</td>";
            echo "<td>" . $row->Client . "</td>";
            echo "<td>" . $row->Technicien . "</td>";
            echo "<td>" . $row->Description ."</td>";
            echo "<td>" . $row->Date_ouverture . "</td>";
            echo "<td>" . $row->Date_fermeture . "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
      <div class="table-responsive">
        <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script id="rendered-js">
        $(document).ready(function($) {
          $(".table-row").click(function() {
            window.document.location = $(this).data("href");
          });
        });
        </script>
      </body>
      </html>
      <?php
      mysqli_close($link);
      ?>
