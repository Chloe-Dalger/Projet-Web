<?php

  //La connexion à la base de donnee + les models dont on a besoin
  require_once('../model/DBconnect.php');
  require_once('../model/lieu.php');



  //password de suppression
  $password='ig32019';

  //récupération du password via le formulaire
  $psw=$_POST['psw'];
  $bool=false;


  //recuperation du nom via l'url
  $nom=$_GET['nom'];
  $idlieu=getIdLieu($nom);

  if (strcmp($psw, $password) == 0) {
    //on supprime le lieu choisi
    $bool=true;
    supprimerLieu($idlieu);
      //page vue voulue
      $message1='Le lieu a bien été supprimé';
      include('../view/delete.php');
  }
  else{
      $message2='Mauvais mot de passe';
      //changer avec la page du lieu
      include('../view/delete.php');
  }

  ?>
