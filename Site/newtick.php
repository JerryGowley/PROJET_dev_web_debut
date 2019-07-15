<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <ul class="menu">
    <li><a class="menu" href="index.php" role="button">Home</a></li>
    <li><a class="active" href="newtick.php" role="button">Créer un ticket</a></li>
    <li><a class="menu" href="tickets.php" role="button">Tous les tickets</a></li>
    <li><a class="menu" href="admin/index.php" role="button">ADMIN</a></li>
  </ul>
  <title>Tickets</title>
  <link rel="stylesheet" media="screen" href="./css/SiteAppli.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body class="container" align="center">
  <h1 style="color:#4444ff;text-align:center;">Squicket</h1>
  <br>
  <a class="btn btn-primary" style="margin-left:45.8%;" href="index.php" role="button">Retour a l'accueil</a><br>
  <br>
  <?php
  include ('header.php');
  error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
  try {
    $sql= "SELECT * From Logiciel";
    $sth=$conexion->prepare($sql,array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
    $sth->execute();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }

  if (isset ($_POST['valider'])){

    $DebutTick=$_POST['DebutTick'];
    $FinTick=$_POST['FinTick'];
    $client=$_POST['client'];
    $Logiciel=$_POST['Logiciel'];
    $Sujet=$_POST['sujet'];
    $Description=$_POST['Description'];
    $Technicien=$_POST['Technicien'];
    $criticite=$_POST['criticite'];

    try {
      $sql = "INSERT INTO Ticket(DebutTick,FinTick,client,Logiciel,Sujet,Description,Technicien,criticite) VALUES('$DebutTick','$FinTick','$client','$Logiciel','$Sujet','$conexion->quote($Description)','$Technicien','$criticite')";
      $sth = $conexion->prepare($sql,array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
      $sth->execute();
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }
  ?>

  <h2 style="margin-left:40%;"> CREATION DE TICKET  : </h2>
  <form  method="post">
    <table style="margin:auto;" class="rounded" >
      <tbody>
        <tr>
        </tr>
        <tr>
          <th>
            <label>Début Incident</label>
          </th>
          <td>
            <input type="text" style="width:219px;" name="DebutTick" id="DebutTick" class="form-control form-control-sm" value="<?php echo $DebutTick ?>" placeholder="yyyy-mm-dd" required>
          </td>
          <th>
            <label>Technicien</label>
          </th>
          <td>
            <input style="width:200px" type="text" value="<?php echo $technicien ?>" name="Technicien"  id="Technicien" required>
          </td>
        </tr>
      </tbody>
    </table>
    <table style="margin:auto;" class="rounded">
      <tbody>
        <tr>
          <th style="width:15%;">Logiciel concerné :</th>
          <td>
            <input style="width:220px" type="text" value="<?php echo $Nom_Logiciel ?>" name="Technicien" id="Technicien" required>
          </td>
          <th >Criticité : </th>
          <td>
            <br>
            <select class="select required form-control select2 select2-offscreen" required name="criticite" id="criticite" required>
              <option value="<?php echo $criticite ?>"><?php echo $criticite?></option>
              <option value="low">Faible</option>
              <option value="normal">Normal</option>
              <option value="important">Important</option>
              <option value="critical">Critique</option></select>
              <br>
            </td>
          </tr>
          <tr>
            <th colspan="1"> Nom Client :</th>
            <td>
              <input size="42" placeholder="maximum 255 caractères" type="text" name="client" id="client" required>
              <br>
            </td>
            <th>
              <label>Fin Incident</label>
            </th>
            <td>
              <input type="text" name="FinTick" id="FinTick" class="form-control form-control-sm" value="<?php echo $FinTick ?>" placeholder="yyyy-mm-dd" required>
            </td>
          </tr>
          <tr>
            <th> Sujet :</th>
            <td colspan="3">
              <input  size="110" placeholder="maximum 255 caractères" value="<?php echo $sujet ?>" type="text" name="sujet" id="sujet" required>
              <br>
            </td>
          </tr>
        </tbody>
      </table>
      <table style="margin:auto;" class="rounded">
        <tbody>
          <tr>
            <th style="width:16.5%;">Description : </th>
            <td style="width:90%;">
              <textarea  class="form-control noresize" name="Description" required rows="15" ><?php echo $Description ?></textarea>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <input class="btn btn-danger" style="margin-left: 47%;" name="valider" type="submit" required value="Créer ticket">
      <br><br><a class="btn btn-primary" href="tickets.php" style="margin-left: 47.8%;"role="button">Retour</a>
    </form>
    <br><br><br>

  </body>
</html>
