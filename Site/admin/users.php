<?php
// include ('../conn_db.php');
include ('../header.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Utilisateurs</title>
	<style>
	.table-row{
		cursor:pointer;
	}
	body {
		margin-left: 15%;
		margin-right: 15%;
	}

</style>
<link rel="stylesheet" media="screen" href="../css/SiteAppli.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<script>
	window.console = window.console || function(t) {};
	if (document.location.search.match(/type=embed/gi)) {
		window.parent.postMessage("resize", "*");
	}
</script>
<body>
	<h1>Liste des Utilisateurs</h1><br>
	<a href="index_adm.php" class="btn btn-primary"  >Revenir a la page de gestion</a><br><br>
	<a href="AddUser.php" class="btn btn-primary" >Ajouter un utilisateur</a><br><br>
	<table class="table table-bordered table-condensed table-striped table-hover" id="myTable">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Nom</th>
				<th scope="col">Prenom</th>
				<th scope="col">E-mail</th>
				<th scope="col">Login</th>
				<th scope="col">Password</th>
				<th scope="col">Fonction</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM utilisateur";
			$sth = $conexion->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$sth->execute();
			foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row)
				{
					?>
					<tr class="table-row" data-href="ModUser.php?id=<?php echo $row->usr_id ?>">
						<?php
						echo "<th>" . $row->usr_id . "</th>";
						echo "<td>" . $row->usr_nom."</td>";
						echo "<td>" . $row->usr_prenom . "</td>";
						echo "<td>" . $row->usr_email . "</td>";
						echo "<td>" . $row->usr_login . "</td>";
						echo "<td>" . $row->usr_pass . "</td>";
						echo "<td>" . $row->usr_fonction . "</td>";
						echo "</tr>";
					}
					?>
				</tr>
			</tbody>
		</table>
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
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
	</html>
