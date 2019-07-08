<?php
include ('conn_db.php');
$id = "111";
$Client = $_POST['Client'];
$Description = "";
$Logiciel = $_POST['Logiciel'];
$Titre_PRB ="";
$Etat= $_POST['Etat'];

$sql = "UPDATE Ticket SET Client='$Client', Logiciel='$Logiciel', Etat='$Etat' WHERE id='$id'";

if ($link->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $link->error;
}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 15px;
    text-align: left;
  }
  table#t01 {
    width: 100%;
    background-color: #f1f1c1;
  }
</style>
</head>
<body>
  <table>
    <tr>
      <th>id</th>
      <th>Client</th>
      <th>Description</th>
      <th>Logiciel</th>
      <th>Titre_PRB</th>
      <th>Etat</th>
    </tr>
    <tr>
      <?php
      $sql = "SELECT * FROM Ticket WHERE id=$id";
      $result = $link->query($sql);
      if ($result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
        {
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["Client"] . "</td>";
          echo "<td>" . $row["Description"] . "</td>";
          echo "<td>" . $row["Logiciel"] . "</td>";
          echo "<td>" . $row["Titre_PRB"] . "</td>";
          echo "<td>" . $row["Etat"] . "</td>";
        }
      }
      $link->close();
      ?>
    </tr>
  </table>
</body>
</html>
