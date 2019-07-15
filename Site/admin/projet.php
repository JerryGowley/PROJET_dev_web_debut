<?php
include ('../header.php');


if(isset ($_GET['supprimer'])) {
  try{
    $Logiciel=$_GET['Nom_Logiciel'];
    $sql = "DELETE from Logiciel WHERE Nom_Logiciel='".$Logiciel."'";
    $sth = $conexion->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();

  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

if (isset ($_POST['ajouter'])){
  $Logiciel=$_POST['Logiciel'];
  try {
    $sql = "INSERT INTO Logiciel(Nom_Logiciel) VALUES('$Logiciel')";
    $sth = $conexion->prepare($sql,array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
    $sth->execute();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}


$sql = "SELECT * FROM Logiciel";
$sth = $conexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute();

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Projet</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
  <?php error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE); ?>

  <div class="container">
    <br><br>
    <a class="btn btn-primary" href="index_adm.php" role="button">Retour a l'accueil</a>
    <br><br><br>
    <table class="table table-bordered table-condensed table-striped table-hover" id="myTable">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Logiciel</th>
          <th scope="col" >Supprimer</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row) {
          ?>
          <tr class="table-row">
            <?php
            echo "<td>" . $row->Nom_Logiciel."</td>";
            echo "<td> <a href=\"projet.php?supprimer=true&Nom_Logiciel=$row->Nom_Logiciel\">sup</a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
      <div class="table-responsive">
        <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js">
        </script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
        </script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'>
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script id="rendered-js">
        </script>
        <form method="post" action="projet.php">
          <br><label style="margin-left:30%;">Veuillez entrer le nom du projet a ajouter ou supprimer svp </label>
          <br><br><input size ="32" style="margin-left:35%;" type="text" name="Logiciel"  id="Logiciel" required>
          <br><br><br>
          <input class="btn btn-primary"  style="margin-left:35%; color:black;" name="ajouter" type="submit" required value="Ajouter projet"></input>
        </form>


      </body>
      </html>
