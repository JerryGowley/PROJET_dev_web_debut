<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Tickets</title>
  <link rel="stylesheet" media="screen" href="../css/SiteAppli.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body class="container" align="center">
  <?php error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
  ?>
  <h1 style="color:#4444ff;text-align:center;">Squicket</h1>
  <br>
  <a class="btn btn-primary" href="index.php" role="button">Retour a l'accueil</a>
  <br>
  <?php
  /* Connexion à la base de donnée */
  // include('../conn_db.php');
  include ('../header.php');


  try {
    $sql= "SELECT * From Logiciel";
    $sth=$conexion->prepare($sql,array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
    $sth->execute();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }


  ?>
  <h2>CREATION DE TICKET  : </h2>
  <form method="post">
    <table class="rounded" >
      <tbody >
        <tr >
        </tr>
        <tr>
          <th>
            <label>Début Incident</label>
          </th>
          <td>
            <form>
              <input style="margin-left:15%;" type="date" name="incident_debut" required id="incident_debut">
            </form>
          </td>
          <th>
            <label>Technicien</label>
          </th>
          <td>
            <input size ="22" autocomplete="off" type="text" name="Technicien" placeholder="Technicien" id="Technicien" required>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="rounded">
      <tbody>
        <tr>
          <th style="width:15%;">Logiciel concerné :</th>
          <td>
            <SELECT class="select required form-control select2 select2-offscreen" name="Logiciel" id="Logiciel" required>
              <?php foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row) { ?>
            <option>  <?php  echo $row->Nom_Logiciel; ?> </option>
            <?php  } ?>
            </SELECT>
          </td>
          <th >Criticité : </th>
          <td>
            <br>
            <select class="select required form-control select2 select2-offscreen" required name="criticite" id="criticite" required>
              <option selected="selected" value="low">Faible</option>
              <option value="normal">Normal</option>
              <option value="important">Important</option>
              <option value="critical">Critique</option></select>
              <br>
            </td>
          </tr>
          <tr>
            <th colspan="1">Sujet :</th>
            <td colspan="3">
              <input size ="64" placeholder="maximum 255 caractères" autocomplete="off" required type="text" name="sujet" id="sujet" required>
              <br>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="rounded">
      <tbody>
        <tr>
          <th style="width:16.5%;">Description : </th>
          <td style="width:90%;">
            <textarea  class="form-control noresize" name="Description" required rows="15" ></textarea>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <input class="btn btn-danger" name="valider" type="submit" required value="Soumettre le ticket">
  </form>

  <?php
  if (isset ($_POST['valider'])){

    $DebutTick=$_POST['incident_debut'];
    $Logiciel=$_POST['Logiciel'];
    $Sujet=$_POST['sujet'];
    $Description=$_POST['Description'];
    $Technicien=$_POST['Technicien'];
    $criticite=$_POST['criticite'];


    $escaped_item = mysql_escape_string($Description);
    printf("Chaîne protégée : %s\n", $escaped_item);

    try {
      $sql = "INSERT INTO Ticket(DebutTick,Logiciel,Sujet,Description,Technicien,criticite) VALUES('$DebutTick','$Logiciel','$Sujet',('$Description'),'$Technicien','$criticite')";
      $sth = $conexion->prepare($sql,array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
      $sth->execute();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  ?>

  <footer>
  </footer>
</body>
</html>
<br>

<br><br>
</body>
</html>
