<?php include('./ScriptPHP/verif.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Report Bleau Admin | Tous les tickets</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" media="screen" href="../css/SiteAppli.css">
  <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>
  <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon"/>
</head>
<body class="container">
  <h1>Report Bleau Admin  | Tous les tickets
    <br>Interface Admin	<a href="ScriptPHP/logout.php" class="deco"><img class="imgdeco" src="../img/button.png" title="Déconnexion" alt="Déconnexion"></a>
  </h1>
  <br>
  <a class="btn btn-primary" href="index_adm.php" role="button">Retour à l'accueil</a>
  <button class="btn btn-secondary">Modifier User</button>
  <br><br>

  <?php
  /* Connexion à la base de donnée */
  include('../co.php');

  /* Execution de la requête dans QRcode_History afin de récuperer l'historique */
  $res = $link->query("select id, date, salle, type, pc, description from Ticket");

  /* Definition du tableau en fonction du resultat obtenu lors de la requete précedente */
  if(isset($res)) {
    echo "<form action='./ScriptPHP/TicketDelete.php' method='post'>";
    echo "<table class=\"table\">";
    echo "<tr>
    <th>ID du ticket</th>
    <th>Date</th>
    <th>Salle</th>
    <th>Type de problème</th>
    <th>Numéro du poste</th>
    <th>Description</th>
    <th><input type='submit' class=\"btn btn-danger\" value='Supprimer la selection'></th>
    </tr>";
    while($notif=mysqli_fetch_assoc($res)){
      echo "<tr><td>".$notif['id']."</td>".
      "<td>".$notif['date']."</td>".
      "<td><a href=\"notif_adm.php?salle=".$notif['salle']."\">".ucfirst($notif['salle'])."</a></td>".
      "<td>".ucfirst($notif['type']).
      "<td>".ucfirst($notif['pc'])."</td>".
      "<td>".$notif['description']."</td>".
      "<td><input type='checkbox' name='todelete[]' value='".$notif['id']."''></td>".
      "</tr>";
    }
    echo "</table>";
  } else
  echo "erreur";
  ?>

</body>
</html>
