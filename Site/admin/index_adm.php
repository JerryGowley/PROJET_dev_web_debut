<?php
// include('../conn_db.php');
include ('../header.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" media="screen" href="../css/SiteAppli.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body class="container" align="center">
	<h1>Tickets
		<br>Interface Admin	<a href="ScriptPHP/logout.php" class="deco"></h1>

			<div class="fadeaway">
				<img class="imgdeco" style="width:155px;height:155px;" src="../img/avatar.png" title="Déconnexion" alt="Déconnexion">
				<div class="overlay">
					<div class="text">ADMIN</div>
				</div>
			</div>
		</a>
	</h1>
	<br>	<br>
	<a class="btn btn-primary" href="all_adm.php" role="button">Tous les tickets</a>
	<a class="btn btn-secondary" href="users.php" >Modifier User</a>
	<a class="btn btn-secondary" href="projet.php" role="button">Gérer les projets</a>
	<a class="btn btn-secondary" href="statistiques.php">Statistiques</a>
	<br><br>

	<br><br>
</body>
</html>
