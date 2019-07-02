<?php
$link=mysqli_connect("localhost","bobo","bobo","bobo"); // localisation, USER, PWD, DB
mysqli_set_charset($link, "utf8");
if(!$link){
  die("<p>connexion impossible</p>");
}
?>
