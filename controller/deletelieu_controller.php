<?php
  require_once('../model/DBconnect.php');
  require_once('../model/ville.php');
  require_once('../model/departement.php');
  require_once('../model/pseudo.php');
  require_once('../model/lieu.php');
  require_once('../model/categorie.php');
  require_once('../model/mot_cle.php');
  require_once('../model/possede_mc.php');

  //recuperation du nom via l'url
  $psw=$_POST['psw'];
  $password='ig32019';
  $nom=$_GET['nom'];
  $idlieu=getIdLieu($nom);
  if (strcmp($psw, $password) == 0) {
    supprimerLieu($idlieu);
      //page vue voulue
      include('../view/accueil.php');
  }
  else{
      //page vue voulue
      include('../controller/affichagedulieu_controller.php?nom='.$nom.'');
  }

  ?>
