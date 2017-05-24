<?php

  //La connexion à la base de donnee + les models dont on a besoin
  require_once('../model/DBconnect.php');
  require_once('../model/ville.php');
  require_once('../model/departement.php');
  require_once('../model/pseudo.php');
  require_once('../model/lieu.php');
  require_once('../model/categorie.php');
  require_once('../model/mot_cle.php');
  require_once('../model/possede_mc.php');


  //recuperation du nom via l'url
  $nom=$_GET['nom'];

  //recuperation des donnees via les requêtes des models
  $idlieu=getIdLieu($nom);
  $idville=getIdVilleLieu($idlieu);
  $idpseudo=getIdPseudoLieu($idlieu);
  $adrlieu=getAdresseLieu($idlieu);
  $deslieu=getDescriptionLieu($idlieu);
  $urllieu=getUrlLieu($idlieu);
  $cpville=getCodePostalVille($idville);
  $nomville=getNomVille($idville);
  $idcat=getIdCategorieLieu($idlieu);
  $nomcat=getNomCategorie($idcat);

  //page vue voulue
  include('../view/updatelieu.php');

?>
