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
      else{

          //La ville existe-t-elle déjà?
          if(is_null(existeVille($cpville))){
          //La ville n existais pas

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

              //Je met mon lieu à jour

              modifNomLieu($nomlieu, $idlieu);
              modifUrlLieu($url, $idlieu);
              modifDescriptionLieu($description, $idlieu);
              modifVilleLieu($idville, $idlieu);
              modifCategorieLieu($idcat, $idlieu);
              modifAdresseLieu($adr, $idlieu);




              // for($i=0; $i<count($motcle); $i++){
              //   if(is_null($motcle[$i])){
              //     creerMotCle($motcle[$i]);
              //     $idmotcle=getIdMotCle($motcle[$i]);
              //     creerMotCleLieu($idlieu, $idmotcle);
              //   }
              //}

              // L'identification a réussi
            $message = 'Votre lieu a bien été modifié !';
        }


  }
  }


  //page vue voulue
  include('../view/updatelieu.php');

?>