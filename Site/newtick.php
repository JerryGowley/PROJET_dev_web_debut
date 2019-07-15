<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
  <?php error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
  ?>
  <h1 style="color:#4444ff;text-align:center;">Squicket</h1>
  <br>
  <a class="btn btn-primary" style="margin-left:44%;" href="index.php" role="button">Retour a l'accueil</a>
  <br>
  <?php
  /* Connexion à la base de donnée */
  // include('conn_db.php');
  include ('header.php');


  try {
    $sql= "SELECT * From Logiciel";
    $sth=$conexion->prepare($sql,array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
    $sth->execute();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }


  ?>
  <h2 style="margin-left:34%;">CREATION DE TICKET  : </h2>
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
            <input type="text" name="DebutTick" id="DebutTick" class="form-control form-control-sm" value="<?php echo $DebutTick ?>" placeholder="yyyy-mm-dd" required>
					</td>
					<th>
						<label>Technicien</label>
					</th>
					<td>
						<input size ="32" type="text" value="<?php echo $technicien ?>" name="Technicien"  id="Technicien" required>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="rounded">
			<tbody>
				<tr>
					<th style="width:15%;">Logiciel concerné :</th>
					<td>
						<input size ="32" type="text" value="<?php echo $Nom_Logiciel ?>" name="Technicien" id="Technicien" required>
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
						<th colspan="1">Sujet :</th>
						<td>
							<input size="42" placeholder="maximum 255 caractères" value="<?php echo $sujet ?>" type="text" name="sujet" id="sujet" required>
							<br>
					</td>
					<th>
						<label>Fin Incident</label>
					</th>
					<td>
							<input type="text" name="FinTick" id="FinTick" class="form-control form-control-sm" value="<?php echo $FinTick ?>" placeholder="yyyy-mm-dd" required>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="rounded">
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
		<input class="btn btn-danger" style="margin-left: 45%;" name="valider" type="submit" required value="Créer ticket">
		<br><br><a class="btn btn-primary" href="tickets.php" style="margin-left: 46.2%;"role="button">Retour</a>
	</form>
	<br><br>
	<br>

  <?php
  if (isset ($_POST['valider'])){

    $DebutTick=$_POST['DebutTick'];
    $FinTick=$_POST['FinTick'];
    $Logiciel=$_POST['Logiciel'];
    $Sujet=$_POST['sujet'];
    $Description=$_POST['Description'];
    $Technicien=$_POST['Technicien'];
    $criticite=$_POST['criticite'];

    try {
      $sql = "INSERT INTO Ticket(DebutTick,FinTick,Logiciel,Sujet,Description,Technicien,criticite) VALUES('$DebutTick','$FinTick','$Logiciel','$Sujet','$conexion->quote($Description)','$Technicien','$criticite')";
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
