<?php
//
//--//////////////////////////////////////////////////////////////////////
//--//Page de connexion à la base de donnée, pour pouvoir accéder à     //
//--//cette base il faut modifier les variable $host, $utilisateur et   //
//--//$base                                                             //
//--//                                                                  //
//--//                Lucas Janet & Boris Laurent                       //
//--//////////////////////////////////////////////////////////////////////
//
$host="localhost";
$utilisateur="bobo";
$motdepasse="bobo";
$base="bobo";

try  {
  $conexion = new PDO('mysql:host='.$host.';dbname='.$base, $utilisateur, $motdepasse,
    [PDO::ATTR_EMULATE_PREPARES => false,
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
   echo "Error connecting to mysql: " . $e->getMessage();
}
?>
