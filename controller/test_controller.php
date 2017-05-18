<?php
  require_once('../model/DBconnect.php');
  require_once('../model/region.php');


  $regions=getAllRegion();

  include('../view/test.php')

?>
