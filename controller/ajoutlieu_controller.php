<?php
  require_once('../model/DBconnect.php');
  require_once('../model/ville.php');
    require_once('../model/departement.php');

      require_once('../model/pseudo.php');
      require_once('../model/lieu.php');
      require_once('../model/categorie.php');
      require_once('../model/mot_cle.php');
            require_once('../model/possede_mc.php');

$categories=getAllCategorie();




    $pseudo=$_POST['pseudo'];
    $nomlieu=$_POST['nomlieu'];
    $description=$_POST['description'];
    $ville=$_POST['ville'];
    $cpville=$_POST['cpville'];
    $url=$_POST['urlim'];
    $categorie=$_POST['categorie'];
    $adr=$_POST['adrlieu'];
    $motscles=$_POST['motscles'];
    $motcle = explode(";", $motscles);
    $bool = true;






  include('../view/test.php');










?>
