<?php

$host="localhost";
  $utilisateur="root";
  $motdepasse="";
  $base="bobo";

  $conexion = new PDO('mysql:host='.$host.';dbname='.$base, $utilisateur, $motdepasse);
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
