<?php
  require_once('../model/DBconnect.php');
  require_once('../model/region.php');
  require_once('../model/departement.php');
        require_once('../model/mot_cle.php');


  $regions=getAllRegion();
  $departs=getAllDepartement();


  include('../view/accueil.php');

?>
