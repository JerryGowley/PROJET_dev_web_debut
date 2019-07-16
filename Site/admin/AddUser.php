<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajout utilisateurs</title>
	<link rel="stylesheet" media="screen" href="bs337/css/SiteAppli.css">
</head>
<body class="container" align="center">
	<?php
	include ('../header.php');
	error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
	if (isset ($_POST['valider'])){
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$login=$_POST['login'];
		$mdp=password_hash($_POST['mdp'],PASSWORD_BCRYPT);
		$fonction=$_POST['fonction'];
		try {
			$sql = "INSERT INTO utilisateur(usr_nom,usr_prenom,usr_email,usr_login,usr_pass,usr_fonction) VALUES('$nom','$prenom','$email','$login','$mdp','$fonction')";
			$sth = $conexion->prepare($sql);
			$sth->execute();
			header('Location:users.php');
			exit();

		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}
	?>

	<h1> AJOUTER UTILISATEUR </h1>
	<form method="post" style="text-align:center;" action="">
		Prenom:<br>
		<input type="text" name="prenom" placeholder="Mickey" required>
		<br>
		<br>Nom:<br>
		<input type="text" name="nom" placeholder="Mouse" required>
		<br><br>Login:<br>
		<input type="text" name="login" placeholder="ThePunisher77" required>
		<br>
		<br>Password:<br>
		<input type="Password" name="mdp" placeholder="*******" required>
		<br><br>
		E-mail:<br>
		<input type="" name="email" required placeholder="Mickey.Mouse@disney.com">
		<br><br>
		<select name="fonction" required>
			<option value="technicien">Technicien</option>
			<option value="administrateur">Administrateur</option>
		</select>
		<br><br><br>
		<input type="submit" name="valider" value="valider" class="btn btn-primary" required>	<a  name="retour" value="retour" style="margin-left:1%;" class="btn btn-primary" href="users.php" required> retour</a>

	</form>


</body>
</html>
