<?php
//
//--//////////////////////////////////////////////////////////////////////
//--//Formulaire de connexion à la partie adminisrateur du site.        //
//--//                                                                  //
//--//                Lucas Janet & Boris Laurent                       //
//--//////////////////////////////////////////////////////////////////////
//
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<title>Squicket | Connexion</title>
	<link rel="stylesheet" media="screen" style="text/css" href="../css/SiteAppli.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="icon" href="../img/favicon.png" type="image/x-icon"/>
	<link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon"/>
</head>
<body class="container" align="center">
	<h1>Outil de ticketing </h1> <br>
	<?php
	include ('../header.php');
	$sql = "SELECT usr_login, usr_pass, usr_fonction FROM utilisateur;";
	$res = $conexion->prepare($sql);
	$res->execute();
	if(isset($res)) {      ?>
		<form method="post" action="./ScriptPHP/connexion.php">
			<div class="input-group mb-3" id="ordinateur">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Login</span>
				</div>
				<input type="text" class="form-control" placeholder="ex: superoot" name="login" required>
			</div>
			<div class="input-group mb-3" id="ordinateur">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Mot de passe</span>
				</div>
				<input type="password" class="form-control" placeholder="Ex: ******" name="mdp" required>
			</div>
			<input class="btn btn-primary" name="submit" type="submit" value="Connexion">
		</form>
		<br>
		<a class="btn btn-primary" href="../index.php" role="button">Retour a l'accueil</a>
		<?php
	} else {
		echo "Erreur de connexion à la base de donnée";
	}  ?>
</body>
</html>
