<?php
  require_once('../model/DBconnect.php');
  require_once('../model/region.php');
  require_once('../model/departement.php');


  $regions=getAllRegion(); //On récupère toutes les regions dans le tableau de tableau
  $departs=getAllDepartement();
	include('../view/accueil.php');

?>
