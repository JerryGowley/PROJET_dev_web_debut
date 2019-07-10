<?php
//session_stat();
$session_id = 1;
include ('conn_db.php');

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
	$Logiciel = $row->Logiciel;
	$sujet = $row->Sujet;
	$Client = $row->Client;
	$Description = $row->Description;
	$technicien = $row->Technicien;
	$criticite = $row->criticite;
}

$sql2 = "SELECT * FROM Ticket";
$sth2 = $conexion->prepare($sql2, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth2->execute();
foreach($sth2->fetchAll(PDO::FETCH_OBJ) as $raw){
	$Nom_Logiciel = $raw->Nom_Logiciel;
}



?>
<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="css/SiteAppli.css">
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
	<a class="btn btn-primary" href="index.php" style="margin-left: 44%;"role="button">Retour a l'accueil</a>
	<br> <br>
	<h1 style="margin-left: 38%;"> Modifier un ticket : </h1>
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
							<input type="text" name="DebutTick"class="form-control form-control-sm" value="<?php echo $DebutTick ?>" placeholder="yyyy-mm-dd" required>
						</form>
					</td>
					<th>
						<label>Technicien</label>
					</th>
					<td>
						<input size ="32" type="text" value="<?php echo $technicien ?>" name="Technicien" id="Technicien" required>
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
							<option> <?php echo $Logiciel ?> </option>
							<?php foreach($sth2->fetchAll(PDO::FETCH_OBJ) as $raw) { ?>
								<option>  <?php  echo $raw->Nom_Logiciel; ?>></option>
							<?php  } ?>

						</SELECT>
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
						<td colspan="3">
							<input size ="102" placeholder="maximum 255 caractères" value="<?php echo $sujet ?>" type="text" name="sujet" id="sujet" required>
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
						<textarea  class="form-control noresize" name="Description"  required rows="15" ><?php echo $Description ?></textarea>
					</td>
				</tr>
			</tbody>
		</table>
		<br>
		<input class="btn btn-danger" style="margin-left: 44%;" name="valider" type="submit" required value="Modifier le ticket">
		<br><br><br><input type="submit" style="margin-left: 45%;" class="btn btn-danger" name="supprimer" value="supprimer">
		<br><br><br>	<a class="btn btn-primary" href="tickets.php" style="margin-left: 45.6%;"role="button">Retour</a>


	</form>
	<br>


	<?php
	if(isset ($_POST['supprimer']))
	{
		try{
			$sql = "DELETE from Ticket WHERE id='".$id_ticket."'";
			echo $sql;
			$sth = $conexion->prepare($sql,array());
			$sth->execute();
			header('Location:tickets.php');
			exit();
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	if (isset ($_POST['valider'])){
		$DebutTick=$_POST['DebutTick'];
		$Technicien=$_POST['Technicien'];
		$Logiciel=$_POST['Logiciel'];
		$criticite=$_POST['criticite'];
		$sujet=$_POST['sujet'];
		$Description=$_POST['Description'];

		try {
			$Description = mysqli_real_escape_string($sth, $_POST['Description']);
			$sql = "UPDATE Ticket
			SET
			DebutTick='".$DebutTick."'
			, Logiciel='".$Logiciel."'
			, Sujet='".$sujet."'
			, Description ='".mysqli_real_escape_string($Description)."'
			, Technicien='".$Technicien."'
			, criticite='".$criticite."'
			WHERE id='".$id_ticket."'";
			echo $sql;

			$sth = $conexion->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$sth->execute();
			header('Location:tickets.php');
			exit();
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}
	?>


	<footer>

	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
