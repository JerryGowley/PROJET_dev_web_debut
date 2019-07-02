<?php
include '../../co.php';
$log = $link->real_escape_string ($_POST['login']);
$mdp = $link->real_escape_string ($_POST['mdp']);
$resultat = $link->query("SELECT mdp FROM Admin WHERE login = '$log'");
$pass = $resultat->fetch_assoc();

if (password_verify($mdp,$pass['mdp']))
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
    <title>Report Bleau Admin | Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" media="screen" href="../css/SiteAppli.css">
    <link rel="icon" href="../../img/favicon.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="../../img/favicon.png" type="image/x-icon"/>
  </head>
  <body container>
    <h2 class="_bb1 _mts">Connexion</h2>
    <p>Identifiant non reconnu !</p>
    <a class="btn btn-primary" href="../index.php" role="button">Recommencer</a>
  </body>
  </html>
  <?php
}
?>
