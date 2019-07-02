<?php

$host="localhost";
  $utilisateur="bobo";
  $motdepasse="bobo";
  $base="bobo";

  $conexion = new PDO('mysql:host='.$host.';dbname='.$base, $utilisateur, $motdepasse);
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
