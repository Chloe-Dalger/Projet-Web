<?php
  //La connexion à la base de donnee + les models dont on a besoin
  require_once('../model/DBconnect.php');
  require_once('../model/region.php');
  require_once('../model/departement.php');


  //On récupère les informations dont on a besoin dans des tableau de tableau
  $regions=getAllRegion();
  $departs=getAllDepartement();

  //page vue voulue
  include('../view/accueil.php');

?>
