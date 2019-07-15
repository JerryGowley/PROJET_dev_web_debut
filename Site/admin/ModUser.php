<!DOCTYPE html>
<html>
<head>
	<style>

/* Bordered form */
form {
  margin-right: 20%;
  margin-left: 20%;
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #5577ee;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

	</style>
	<link rel="stylesheet" media="screen" href="bs337/css/SiteAppli.css">
	<title>modify User</title>
</head>
<body>

	<?php
	// include ('../conn_db.php');
	include ('../header.php');
	$id=$_GET['id'];
	error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

	try {
		$sql= "SELECT * From utilisateur WHERE usr_id=$id";
		$sth=$conexion->prepare($sql,array());
		$sth->execute();
	} catch (PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}

	foreach($sth->fetchAll(PDO::FETCH_OBJ) as $row) {

		}
		?>

		<form method="post" action="">
			Prenom:<br>
			<input type="text" name="prenom" required value="<?php echo $row->usr_prenom ?>">
			<br>
			Nom:<br>
			<input type="text" name="nom" required value="<?php echo $row->usr_nom ?>" >
			<br>Login:<br>
			<input type="text" name="login" required value="<?php echo $row->usr_login ?>">
			<br>
			Password:<br>
			<input type="Password" name="mdp" required value="<?php echo $row->usr_pass ?>">
			<br>
			E-mail:<br>
			<input type="" name="email" required value="<?php echo $row->usr_email ?>">
			<br>
			<br>Fonction:<br>
			<select name="fonction" value="<?php echo $row->usr_fonction ?>" required>
				<option value="technicien">Technicien</option>
				<option value="administrateur">Administrateur</option>
			</select>
			<br>
			<br><br>
			<input type="submit" name="valider" value="valider">
			<input type="submit" name="supprimer" value="supprimer">
		</form>

<?php

	if(isset ($_POST['supprimer']))
	{
		try{
			$sql = "DELETE FROM utilisateur WHERE usr_id ='" .$id."'";
			$sth = $conexion->prepare($sql,array());
			$sth->execute();
			header('Location:users.php');
			exit();
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}
	if (isset ($_POST['valider'])){
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$email=$_POST['email'];
		$login=$_POST['login'];
		$mdp=password_hash($_POST['mdp'],PASSWORD_BCRYPT);
		$fonction=$_POST['fonction'];
		try {

			$sql = "UPDATE utilisateur
			SET usr_nom='".$nom."'
			, usr_prenom='".$prenom."'
			, usr_email='".$email."'
			, usr_login='".$login."'
			, usr_pass ='".$mdp."'
			, usr_fonction='".$fonction."'
			WHERE usr_id='".$id."'";

			$sth = $conexion->prepare($sql,array());
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
