    <?php

    //La connexion à la base de donnee + les models dont on a besoin
    require_once('../model/DBconnect.php');
    require_once('../model/ville.php');
    require_once('../model/departement.php');
    require_once('../model/lieu.php');
    require_once('../model/region.php');


    //si post n'est pas vide alors le formulaire a été envoyé
    if(!empty($_POST))
      {

        //on récupère les variables du formulaire
        $ville=$_POST['ville'];
        $region=$_POST['region'];
        $depart=$_POST['depart'];




            //si la ville, la région et le département sont vide alors il n'y a pas de filtre de sélection
            if(empty($ville) && strcmp($region, "choisir1")==0 && strcmp($depart, "choisir2")==0){
              $lieux=getAllLieu();
            }
            else{
              if(!(strcmp($region, "choisir1")==0)){
                //si le champs région n'est pas vide alors on récupère le nom de la région
                $nomregion=getNomRegion($region);
                if(!(strcmp($depart, "choisir2")==0)){
                  //si le champs département n'est pas vide alors on récupère le nom du département
                  $nomdepart=getNomDepartement($depart);


                  if(!empty($ville)){
                      //si le champs ville n'est pas vide alors on récupère l'id de la ville
                      $idville=getIdVille($ville);

                      //si l'id de la ville est nulle alors la ville n'existe pas dans la base de données, alors il n'y a pas de lieux qui lui correspondent
                      if(is_null($idville)){
                          $message="Il n y a rien à afficher pour votre selection";
                      }
                      else{
                        //si la ville existe dans la base de donnée alors on affiche les résultats selon les filtres
                        $lieux=getAllVilleDepartementRegionLieu($idville, $depart, $region);
                      }
                  }
                  else{
                    //si la ville n'est pas rempli alors on ne la prend pas en compte dans nos filtres
                    $lieux=getAllDepartementRegionLieu($depart, $region);
                  }
                }
                else{

                    if(!empty($ville)){
                      //si le champs ville est rempli alors on récupère son id
                      $idville=getIdVille($ville);
                      if(is_null($idville)){
                          //si l'id n'existe pas alors la ville n'existe pas dans la base de donnée donc il n'y a rien a afficher
                          $message="Il n y a rien à afficher pour votre selection";
                      }
                      else{
                        //On affiche les résultats selon les filtres choisis
                        $lieux=getAllVilleRegionLieu($idville, $region);
                      }
                    }
                    else{
                      //On affiche les résultats selon les filtres choisis
                      $lieux=getAllRegionLieu($region);
                    }

                }



                }
                else{
                    //on regarde si le champs département est bien rempli
                    if(!(strcmp($depart, "choisir2")==0)){
                      //s'il est rempli alors on récupère son id
                      $nomdepart=getNomDepartement($depart);
                      if(!empty($ville)){
                        //si le champs ville est rempli alors on récupère son id
                        $idville=getIdVille($ville);
                        if(is_null($idville)){
                            //si l'id de la ville renvoie null alors la ville n'existe pas donc il n'y a rien a afficher
                            $message="Il n y a rien à afficher pour votre selection";
                        }
                        else{
                          //On affiche les résultats selon les filtres choisis
                          $lieux=getAllVilleDepartementLieu($idville, $depart, $region);
                        }
                      }
                      else{
                        //On affiche les résultats selon les filtres choisis
                        $lieux=getAllDepartementLieu($depart);
                      }

                    }
                    else{
                      //On affiche les résultats selon les filtres choisis
                        $idville=getIdVille($ville);
                        $lieux=getAllVilleLieu($idville);
                    }


                }
                }
        }






            if(is_null($lieux[0])){
              //s'il n'y a rien dans les lieux que l'on a récupérer alors il n'y a rien a afficher
              $message="Il n y a rien à afficher pour votre selection";
            }




            //page voulue
            include('../view/affichagelieu.php');
?>
