<?php include('./ScriptPHP/verif.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<style>
.fadeaway {
  position: relative;
  width: 50%;
}

.image {
  display: block;
	margin-right: 2%;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #008CBA;
}

.fadeaway:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
</style>
	<meta charset="UTF-8" />
	<title>Report Bleau Admin | Home</title>
	<link rel="stylesheet" media="screen" href="../css/SiteAppli.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body class="container" align="center">
	<h1>Tickets
		<br>Interface Admin	<a href="ScriptPHP/logout.php" class="deco">
			<div class="fadeaway">
			<img class="imgdeco" src="../img/button.png" title="Déconnexion" alt="Déconnexion">
			<div class="overlay">
				<div class="text">ADMIN</div>
			</div>
		</div>


		</a>
	</h1>
	<br>
	<a class="btn btn-primary" href="all_adm.php" role="button">Tous les tickets</a>
	<button class="btn btn-secondary">Modifier User</button>
	<br><br>
	<?php include('../co.php'); ?>

	<br><br>
</body>
</html>
