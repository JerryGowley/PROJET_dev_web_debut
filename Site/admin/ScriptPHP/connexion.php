<?php
include '../../conn_db.php';

$log = $_POST['login'];
$mdp = $_POST['mdp'];

$sql = "SELECT usr_pass, usr_fonction FROM utilisateur WHERE usr_login = '" . $log ."';";
$resultat = $conexion->prepare($sql);
$resultat->execute();

$pass = $resultat->fetch(PDO::FETCH_OBJ);
if(password_verify($mdp,$pass->usr_pass) && $pass->usr_fonction == "administrateur")
{
  session_start();
  $_SESSION['login'] = $log;
  if (isset($_SESSION['login_redirect'])) {
    header("Location: " . $_SESSION['login_redirect']);
    unset($_SESSION['login_redirect']);
  }
  else {
    header('Location: ../index_adm.php');
  }

} else {
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8" />
    <title>Squicket connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" media="screen" href="../css/SiteAppli.css">
    <link rel="icon" href="../../img/favicon.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="../../img/favicon.png" type="image/x-icon"/>
  </head>
  <body container>
    <h2 class="_bb1 _mts">Connexion</h2>
    <p>Identifiant non reconnu, ou vous ne possedez pas les droits administrateurs!</p>
    <a class="btn btn-primary" href="../index.php" role="button">Recommencer</a>
  </body>
  </html>
  <?php
}
?>
