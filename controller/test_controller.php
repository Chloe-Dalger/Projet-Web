<?php
  require_once('../model/DBconnect.php');
  require_once('../model/region.php');
  require_once('../view/test.php');

  $regions=getAllRegion();

  include('../view/test.php')

?>
