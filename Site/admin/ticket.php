<?php
$session_id = 1;
include ('../header.php');
$id_ticket = $_GET['id'];
try {
	$sql = "SELECT * FROM Ticket WHERE id = '$id_ticket'";;
	$sth=$conexion->prepare($sql,array());
	$sth->execute();
} catch (PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}
foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row) {
	error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
	$id = $row->id;
	$DebutTick = $row->DebutTick;
	$FinTick = $row->FinTick;
	$Logiciel = $row->Logiciel;
	$sujet = $row->Sujet;
	$Client = $row->Client;
	$Description = $row->Description;
	$technicien = $row->Technicien;
	$criticite = $row->criticite;
}
try {
	$sql2 = "SELECT * FROM Logiciel";
	$sth2 = $conexion->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$sth2->execute();
	foreach($sth2->fetchAll(PDO::FETCH_OBJ) as $raw){
		$Nom_Logiciel = $raw->Nom_Logiciel;
	}
}
catch (PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}

if(isset ($_POST['supprimer']))
{
	try{
		$sql = "DELETE from Ticket WHERE id='".$id_ticket."'";
		echo $sql;
		$sth = $conexion->prepare($sql,array());
		$sth->execute();
		header('Location:all_adm.php');
		exit();
	} catch (PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
}

if (isset ($_POST['valider'])){
	$DebutTick=$_POST['DebutTick'];
	$FinTick=$_POST['FinTick'];
	$Technicien=$_POST['Technicien'];
	$Description=$_POST['Description'];
	$Logiciel=$_POST['Logiciel'];
	$criticite=$_POST['criticite'];
	$sujet=$_POST['sujet'];
	echo $Description;
	try {
		$sql = "UPDATE Ticket
		SET
		DebutTick='".$DebutTick."'
		, FinTick='".$FinTick."'
		, Logiciel='".$Logiciel."'
		, Sujet='".$sujet."'
		, Description =".$conexion->quote($Description)."
		, Technicien='".$Technicien."'
		, criticite='".$criticite."'
		WHERE id='".$id_ticket."'";
		echo $sql;

		$sth = $conexion->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$sth->execute();
		header('Location:all_adm.php');
		exit();
	} catch (PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
}

?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/SiteAppli.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		margin-left: 12%;
	}
	.table-row{
		cursor:pointer;
	}
	tbody
	{
		display: table-row-group;
		vertical-align: middle;
		border-color: inherit;
	}
	.noresize
	{
		resize: none;
	}
	</style>
</head>
<body>
	<?php error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE); ?>
	<br>
	<br> <br>
	<h1 style="margin-left: 38%;"> Modifier un ticket : </h1>


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
              <input size="42" placeholder="maximum 255 caractères" value="<?php echo $client ?>"type="text" name="client" id="client" required>
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
              <input  size="105" placeholder="maximum 255 caractères" value="<?php echo $sujet ?>" type="text" name="sujet" id="sujet" required>
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
      <input class="btn btn-danger" style="margin-left: 47%;" name="valider" type="submit" required value="Modifier le ticket">
      <br><br><a class="btn btn-primary" href="all_adm.php" style="margin-left: 47.8%;"role="button">Retour</a>
  	</form>
  </body>
</html>
