<?php
//session_stat();
$session_id = 1;
?>
<?php
include ('conn_db.php');

$id_ticket = $_GET['id'];

$sql = "SELECT * FROM Ticket WHERE id = '$id_ticket'";
$sth = $conexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute();
$id_Logiciel = "";
$id_Client = "";
$id_Titre_PRB = "";
$id_Description = "";
$id_Date_Ouverture = "";
$id_Date_Fermeture = "";
$id_Etat = "";
$id_Technicien = "";

foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row)
{
	$id_Logiciel = $row->Logiciel;
	$id_Titre_PRB = $row->Titre_PRB;
	$id_Client = $row->Client;
	$id_Description = $row->Description;
	$id_Date_Ouverture = $row->Date_ouverture;
	$id_Date_Fermeture = $row->Date_fermeture;
	$id_Etat = $row->Etat;
	$id_Technicien = $row->Technicien;
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
	<header>
		<br>
		<a class="btn btn-primary" href="index.php" style="margin-left: 44%;"role="button">Retour a l'accueil</a>
		<br> <br>

	</header>

	<h1 style="margin-left: 38%;"> Modifier un ticket : </h1>
	<form>
		<table class="rounded" >
			<tbody >
				<tr >
					<th colspan="4" align="center">Numero de ticket : <?php echo $id_ticket ?></th>
				</tr>
				<tr>
					<th>
						<label>Date d'ouverture :</label>
					</th>
					<td>
						<input type="text" class="form-control form-control-sm" placeholder="yyyy-mm-dd" required>
					</td>
					<th>
						<label>Par :</label>
					</th>
					<td>
						<input type="text" class="form-control form-control-sm" placeholder="Technicien" required>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="rounded">
			<tbody>
				<tr>
					<th>Type de probleme :</th>
					<td>
						<select id="inputState" class="custom-select custom-select-sm">
							<option selected><?php echo $id_Titre_PRB ?></option>
							<option>Autre</option>
							<option>Logiciel</option>
							<option>Matériel</option>
							<option>Réseau</option>
						</select>
					</td>
					<th>Etat : </th>
					<td>
						<select id="inputState" class="custom-select custom-select-sm">
							<option selected>Ouvert</option>
							<option>Attribué</option>
							<option>En cours</option>
							<option>Clos</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Logiciel :</th>
					<td>
						<select id="inputState" class="custom-select custom-select-sm">
							<option selected>Choose...</option>
							<option>...</option>
						</select>
					</td>
					<th>Attribue a :</th>
					<td>
						<select id="inputState" class="custom-select custom-select-sm">
							<option selected>Choose...</option>
							<option>...</option>
						</select>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="rounded">
			<tbody>
				<tr>
					<th style="width:10%;">Description :</th>
					<td style="width:90%;">
						<textarea  class="form-control noresize" rows="12" ></textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</form>

	<br>
	<input class="btn btn-danger" style="margin-left: 44%;" name="submit" type="submit" value="Soumettre le ticket">
	<br>

	<footer>

	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
