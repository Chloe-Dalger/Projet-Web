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


if(!empty($_POST))
  {

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



    // Si le tableau $_POST existe alors le formulaire a été envoyé

    // Le login est-il rempli ?
    if(empty($pseudo))
    {
      $message = 'Veuillez indiquer votre pseudo !';
    }
      // Le mot de passe est-il rempli ?
      elseif(empty($nomlieu))
    {
      $message = 'Veuillez indiquer le nom du lieu';
    }
      // Le mot de passe est-il correct ?
      elseif(empty($ville))
    {
      $message = 'Veuillez indiquer la ville où se trouve le lieu';
    }


}




  include('../view/test.php');










?>
