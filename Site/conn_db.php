<?php
$host="localhost";
<<<<<<< HEAD
$utilisateur="bobo";
$motdepasse="bobo";
$base="bobo";
=======
  $utilisateur="root";
  $motdepasse="";
  $base="bobo";

>>>>>>> master
try  {
  $conexion = new PDO('mysql:host='.$host.';dbname='.$base, $utilisateur, $motdepasse,
    [PDO::ATTR_EMULATE_PREPARES => false,
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
   echo "Error connecting to mysql: " . $e->getMessage();
}
?>
