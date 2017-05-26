<?php

  //La connexion à la base de donnee + les models dont on a besoin
  require_once('../model/DBconnect.php');
  require_once('../model/ville.php');
  require_once('../model/departement.php');
  require_once('../model/pseudo.php');
  require_once('../model/lieu.php');
  require_once('../model/categorie.php');



  //recuperation du nom via l'url
  $nom=$_GET['nom'];
  $idlieu=getIdLieu($nom);

  // Si le tableau $_POST existe alors le formulaire a été envoyé
  if(!empty($_POST))
    {


      //on récupere toutes les données du formulaire dans des variables
      $nomlieu=$_POST['nomlieu'];
      $description=$_POST['description'];
      $ville=$_POST['ville'];
      $cpville=$_POST['cpville'];
      $url=$_POST['urlim'];
      $ctegorie=$_POST['ctegorie'];
      $adr=$_POST['adrlieu'];

      echo $nomlieu;
      echo $ville;

      //$motscles=$_POST['motscles'];
      //$motcle = explode(";", $motscles);

      //booléen nous permettant de savoir si le département est valide
      $bool= True;

      //on retrouve le département grâce au code postal donné
      $dep=substr($cpville, 0, 2);





      //le nom du lieu est-il rempli?
      if(empty($nomlieu))
      {
        $message = 'Veuillez indiquer le nom du lieu';
      }
        // La ville est-elle renseignée?
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

          //La ville existe-t-elle déjà?
          if(is_null(existeVille($cpville))){
          //La ville n existaist pas

          //On regarde la validité du département, donc du code postal
            if(is_null(existeDepartement($dep))){
              //Si le département associé au code postal n'existe pas alors le code postal n est pas valide
              $bool = false;
            }else {
              //on récupère l'id du département
              $iddep=getIdNDepartement($dep);
              creerVille($ville,$cpville,$iddep);
              //La ville a bien été créée

            }
          }
        if($bool){

              //je récupère l'id de la ville et de la catégorie
              $idville=getIdVille($cpville);
              $idcat=getIdCategorie($ctegorie);

              //Mettre le lieu à jour
              modifLieu($nomlieu, $description, $url, $adr, $idcat, $idville, $idlieu);

              //on créé le message de modification
            $message = 'Votre lieu a bien été modifié !';
        }


  }
  }


  //page vue voulue
  include('../view/updatelieu.php');

?>
