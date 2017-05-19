<?php
  require_once('../model/DBconnect.php');
  require_once('../model/region.php');
  require_once('../model/departement.php');


  $regions=getAllRegion();
  $departs=getAllDepartement();


  include('../view/accueil.php');

?>
