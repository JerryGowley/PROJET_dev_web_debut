<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Tickets</title>
	<link rel="stylesheet" media="screen" href="./css/SiteAppli.css">
	<link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<script>
window.console = window.console || function(t) {};
</script>
<script>
if (document.location.search.match(/type=embed/gi)) {
  window.parent.postMessage("resize", "*");
}
</script>

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
