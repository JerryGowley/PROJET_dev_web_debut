<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<ul class="menu">
  <li><a class="menu" href="index.php" role="button">Home</a></li>
  <li><a class="active" href="newtick.php" role="button">Créer un ticket</a></li>
  <li><a class="menu" href="tickets.php" role="button">Tous les tickets</a></li>
  <li><a class="menu" href="admin/index.php" role="button">ADMIN</a></li>
</ul>
<title>Tickets</title>
<link rel="stylesheet" media="screen" href="./css/SiteAppli.css">
<link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body class="container" align="center">
  <h1 style="color:#4444ff;text-align:center;">Squicket</h1>
  <br>
  <a class="btn btn-primary" href="index.php" role="button">Retour a l'accueil</a>
  <br><br>
  <?php
  /* Connexion à la base de donnée */
  include('co.php');
  $res = $link->query("select * from Logiciel");
  ?>
  <h2>CREATION DE TICKET  : </h2>
  <br>
  <br>
  <form>
    <table class="rounded" >
      <tbody >
        <tr >
        </tr>
        <tr>
          <th>
            <label>Début Incident</label>
          </th>
          <td>
            <form>
              <input style="margin-left:15%;" type="date" name="incident_debut" id="incident_debut">
            </form>
          </td>
          <th>
            <label>Fin prévisionnel </label>
          </th>
          <td>
            <form>
              <input style="margin-left:15%; "type="date" name="incident_fin" id="incident_fin">
            </form>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="rounded">
      <tbody>
        <tr>
          <th style="width:15%;">Logiciel concerné :</th>
          <td>
            <FORM>
              <SELECT class="select required form-control select2 select2-offscreen" id="NomLogic" required>
                <?php foreach ($res as $logiciel) {    ?>
                  <OPTION> <?php echo $logiciel["Nom_Logiciel"]?>
                  <?php } ?>
                </SELECT>
              </FORM>
            </td>
            <th >Criticité : </th>
            <td>
              <br>
              <select class="select required form-control select2 select2-offscreen" name="ticket[priority]" id="ticket_priority" required>
                <option selected="selected" value="low">Faible</option>
                <option value="normal">Normal</option>
                <option value="important">Important</option>
                <option value="critical">Critique</option></select>
                <br>
              </td>
            </tr>
            <tr>
              <th colspan="1">Sujet :</th>
              <td colspan="3">
                <input size ="64" placeholder="maximum 255 caractères" autocomplete="off" type="text" name="ticket[subject]" id="ticket°_sujet" required>
                <br>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="rounded">
        <tbody>
          <tr>
            <th style="width:16.5%;">Description : </th>
            <td style="width:90%;">
              <textarea  class="form-control noresize" rows="15" ></textarea>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    <footer>
    </footer>
  </body>
  </html>
  <br>
  <input class="btn btn-danger" name="submit" type="submit" value="Soumettre le ticket">
  <br><br>
</body>
</html>
