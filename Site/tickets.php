<?php
//
//--//////////////////////////////////////////////////////////////////////
//--//Cette page affiche la liste des tickets, en cliquant sur un ticket//
//--//la page ticket.php s'affiche, elle affiche la page de modification//
//--//du ticket avec la possiblité pour les non-admin de modifier       //
//--//certains champs.                                                  //
//--//                                                                  //
//--//La table de la base de donnée est la table ticket                 //
//--//                                                                  //
//--//                Lucas Janet & Boris Laurent                       //
//--//////////////////////////////////////////////////////////////////////
//
include ('header.php');
$sql = "SELECT * FROM Ticket";
$sth = $conexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute();
?>
<script>
window.console = window.console || function(t) {};
if (document.location.search.match(/type=embed/gi)) {
	window.parent.postMessage("resize", "*");
}
</script>
<script id="rendered-js">
$(document).ready(function($) {
	$(".table-row").click(function() {
		window.document.location = $(this).data("href");
	});
});

document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
</script>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"><br>
	<ul style="width: 77%; margin-left:11.5%;" class="menu">
		<li><a class="menu" href="index.php" role="button">Home</a></li>
		<li><a class="menu" href="newtick.php" role="button">Créer un ticket</a></li>
		<li><a class="active" href="tickets.php" role="button">Tous les tickets</a></li>
		<li><a class="menu" href="admin/index.php" role="button">ADMIN</a></li>
	</ul>
	<title>Tickets</title>
	<link rel="stylesheet" media="screen" href="./css/SiteAppli.css">
	<link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<br><br>
		<a class="btn btn-primary" href="index.php" role="button">Retour a l'accueil</a>
		<br><br><br>
		<table class="table table-bordered table-condensed table-striped table-hover" id="myTable">
			<thead class="thead-dark">
				<tr>
					<th scope="col">id</th>
					<th scope="col">Logiciel</th>
					<th scope="col">Sujet</th>
					<th scope="col">Client</th>
					<th scope="col">Technicien</th>
					<th scope="col">Description</th>
					<th scope="col">Date d'ouverture</th>
					<th scope="col">Fin Ticket</th>
					<th scope="col">Criticité</th>
				</tr>
			</thead>
			<tbody>
				<?php	foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row) {  ?>
					<tr class="table-row" data-href="ticket.php?id=<?php echo $row->id ?>">
						<?php
						echo "<th>" . $row->id . "</th>";
						echo "<td>" . $row->Logiciel."</td>";
						echo "<td>" . $row->Sujet . "</td>";
						echo "<td>" . $row->client . "</td>";
						echo "<td>" . $row->Technicien . "</td>";
						echo "<td>" . $row->Description ."</td>";
						echo "<td>" . $row->DebutTick . "</td>";
						echo "<td>" . $row->FinTick . "</td>";
						echo "<td>" . $row->criticite . "</td>";
						echo "</tr>";
					}	?>
				</tbody>
			</table>
			<div class="table-responsive">
			</div>
		</body>
	</html>
