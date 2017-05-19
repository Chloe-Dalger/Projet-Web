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



      if($bool){
            if(is_null(existePseudo($pseudo))){
              creerPseudo($pseudo);
            }
            $idpseudo=getIdPseudo($pseudo);
            $idville=getIdVille($ville);
            $idcat=getIdCategorie($categorie);
            creerLieu($nomlieu, $url, $description, $adr, $idpseudo, $idville, $idcat);
            $idlieu=getIdLieu($nom);
            for($i=0; $i<count($motcle); $i++){
              if(is_null($motcle[$i])){
                creerMotCle($motcle[$i]);
                $idmotcle=getIdMotCle($motcle[$i]);
                creerMotCleLieu($idlieu, $idmotcle);
              }
            }
            // L'identification a réussi
          $message = 'Votre lieu a bien été ajouté !';

}

  include('../view/test.php');










?>
