<?php

  //La connexion à la base de donnee + les models dont on a besoin
  require_once('../model/DBconnect.php');
  require_once('../model/lieu.php');



  //password de suppression
  $password='ig32019';

  //récupération du password via le formulaire
  $psw=$_POST['psw'];


  //recuperation du nom via l'url
  $nom=$_GET['nom'];
  $idlieu=getIdLieu($nom);

  if (strcmp($psw, $password) == 0) {
    //on supprime le lieu choisi
    supprimerLieu($idlieu);
      //page vue voulue
      $message='Le lieu a bien été supprimé';
      include('../view/delete.php');
  }
  else{
      $message='Mauvais mot de passe';
      //changer avec la page du lieu
      include('../view/delete.php');
  }

  ?>
