<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">

	<title>Ajout utilisateurs</title>
	<link rel="stylesheet" media="screen" href="bs337/css/SiteAppli.css">
</head>
<body class="container" align="center">
	<?php 
	include ('../conn_db.php');

	error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
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
		<br><br>
		<br>Password:<br>
		<input type="Password" name="mdp" placeholder="*******" required>
		<br>
		<br>Departement:<br>
		<input type="text" name="depart" placeholder="77" required>
		<br>
		<br>Ville:<br>
		<input type="text" name="ville" placeholder="Courbevoie" required>
		<br>
		<br>email:<br>
		<input type="email" name="email" placeholder="IciQueTuRentres@email.com" required>
		<br>
		<br>Telephone:<br>
		<input type="text" name="tel" placeholder="0102030405" required>
		<br>
		<br><br>
		<input type="submit" name="valider" value="valider" required>
	</form> 

	<?php


	if (isset ($_POST['valider'])){
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$login=$_POST['login'];
		$mdp=$_POST['mdp'];
		$depart=$_POST['depart'];
		$ville=$_POST['ville'];
		$tel=$_POST['tel'];
		try {
			$sql = "INSERT INTO utilisateur(usr_nom,usr_prenom,usr_email,usr_login,usr_pass,usr_dep,usr_ville,usr_tel) VALUES('$nom','$prenom','$email','$login','$mdp','$depart','$ville','$tel')";
			$sth = $conexion->prepare($sql);
			$sth->execute();
			header('Location:users.php');
			exit();
			
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	?>

</body>
</html>
