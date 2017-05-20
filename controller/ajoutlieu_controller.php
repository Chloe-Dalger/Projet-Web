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
    $ctegorie=$_POST['ctegorie'];
    $adr=$_POST['adrlieu'];
    $motscles=$_POST['motscles'];
    $motcle = explode(";", $motscles);
    $bool= True;
    $dep=substr($cpville, 0, 2);



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
    else{
      // L'identification a réussi
    $message = 'Je suis ici';

      // if(!is_null(existeLieu($nomlieu, $ville))){
      //   // L'identification a réussi
      $message1 = 'Je suis bien rentré';

        if(is_null(existeVille($cpville))){
          // L'identification a réussi
        $message3 = 'La ville n existais pas';

          if(is_null(existeDepartement($dep))){
            $message = 'Le code postal n est pas valide';
            $bool = false;
          }else {
            $message4 = 'J ai bien rajouté la ville ';
            $iddep=getIdNDepartement($dep);
            creerVille($ville,$cpville,$iddep);
            // L'identification a réussi

          }
        }
      if($bool){
            if(is_null(existePseudo($pseudo))){
              // L'identification a réussi
            $message5 = 'Le pseudo n existait pas';
              creerPseudo($pseudo);
            }
            $idpseudo=getIdPseudo($pseudo);
            $idville=getIdVille($ville);
            $idcat=getIdCategorie($ctegorie);
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
          $message6 = 'Jai creer les mots cles';
            // L'identification a réussi
          $message = 'Votre lieu a bien été ajouté !';
      }


}
}




  include('../view/test.php');










?>
