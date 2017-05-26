<?php

  //La connexion à la base de donnee + les models dont on a besoin
  require_once('../model/DBconnect.php');
  require_once('../model/ville.php');
  require_once('../model/departement.php');
  require_once('../model/pseudo.php');
  require_once('../model/lieu.php');
  require_once('../model/categorie.php');
  //require_once('../model/mot_cle.php');
  //require_once('../model/possede_mc.php');

  //on récupère toutes les catégorie de la base de donnée
  $categories=getAllCategorie();

  //si le formulaire a été envoyé alors il n'est pas vide
  if(!empty($_POST))
    {

      //on récupère les variables du formulaire
      $pseudo=$_POST['pseudo'];
      $nomlieu=$_POST['nomlieu'];
      $description=$_POST['description'];
      $ville=$_POST['ville'];
      $cpville=$_POST['cpville'];
      $url=$_POST['urlim'];
      $ctegorie=$_POST['ctegorie'];
      $adr=$_POST['adrlieu'];
      //$motscles=$_POST['motscles'];
      //$motcle = explode(";", $motscles);

      //booléen qui va nous aider à déterminer si le département existe ou non
      $bool= True;

      //on récupère le numéro de département grâce au code postal
      $dep=substr($cpville, 0, 2);



      //le pseudo est-il rempli?
      if(empty($pseudo))
      {
        $message = 'Veuillez indiquer votre pseudo !';
      }
        //Le nom du lieu est-il rempli?
        elseif(empty($nomlieu))
      {
        $message = 'Veuillez indiquer le nom du lieu';
      }
        //La ville est-elle remplie?
        elseif(empty($ville))
      {
        $message = 'Veuillez indiquer la ville où se trouve le lieu';
      }
      elseif(getimagesize($url)==false) {
        $message='L URL saisie de l image n est pas une URL';

      }
      elseif(strlen($cpville)!=5){
        $message='Le code postal doit être composé de 5 chiffres';

      }
      elseif(strlen($deslieu)>700){
        $message='La description doit faire moins de 701 caractères';

      }
      elseif(strlen($url)>300){
        $message='L url doit faire moins de 301 caractères';

      }
      elseif(strlen($pseudo)>20){
        $message='Le pseudo doit faire moins de 21 caractères';

      }
      elseif(strlen($nomlieu)>50){
        $message='Le nom du lieu doit faire moins de 51 caractères';

      }
      elseif(strlen($ville)>50){
        $message='Le nom de la ville doit faire moins de 51 caractères';

      }
      elseif(strlen($adr)>100){
        $message='L adresse du lieu doit faire moins de 101 caractères';

      }
      else{

          if(is_null(existeVille($cpville))){
            //si le code postal n'existe pas alors la ville n'existe pas

            if(is_null(existeDepartement($dep))){
              //si le département n'existe pas alors le code postal n'est pas valide
              $bool = false;
            }else {
              //Sinon on créé la ville
              $iddep=getIdNDepartement($dep);
              creerVille($ville,$cpville,$iddep);

            }
          }
        if($bool){
              if(is_null(existePseudo($pseudo))){
                //Si le pseudo n'existe pas déjà on le créé
                creerPseudo($pseudo);
              }

              //on récupère les id grâce aux données du formulaire et/ou de la base de données
              $idpseudo=getIdPseudo($pseudo);
              $idville=getIdVille($cpville);
              $idcat=getIdCategorie($ctegorie);

              //on créé notre nouveau lieu
              creerLieu($nomlieu, $url, $description, $adr, $idpseudo, $idville, $idcat);
               $idlieu=getIdLieu($nom);

               //si on décide de prendre en compte les mots clés
              // for($i=0; $i<count($motcle); $i++){
              //   if(is_null($motcle[$i])){
              //     creerMotCle($motcle[$i]);
              //     $idmotcle=getIdMotCle($motcle[$i]);
              //     creerMotCleLieu($idlieu, $idmotcle);
              //   }
              //}

              // L'identification a réussi
            $message = 'Votre lieu a bien été ajouté !';
        }


      }
  }



  //page voulue
  require_once('../view/ajoutlieu.php');










?>
