<!DOCTYPE html>
<html lang="fr">
<head>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
label {
  margin-left:10%;
}
  table {
      border-collapse: separate;
      border: 1px solid black;
      width: 60%;
      border-spacing: 15px;
      table-layout: auto;
  }
  th {
    border-collapse: separate;
      border: 1px solid black;
      background-color: #f2f2f2;
      width: 15%;
  }
  label input {
    width: 15%;
  }

  td {
    border-collapse: separate;
      border: 1px solid black;
      width: 30%;
  }
  tbody
  {
    display: table-row-group;
      vertical-align: middle;
      border-color: inherit;
  }
  .noresize
  {
      resize: none;
  }
</style>
  <meta charset="UTF-8">
  <title>Tickets</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" media="screen" href="./css/SiteAppli.css">
  <!-- <link rel="icon" href="./img/favicon.png" type="image/x-icon"/> -->
  <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
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
