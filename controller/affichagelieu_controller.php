    <?php
    require_once('../model/DBconnect.php');
    require_once('../model/ville.php');
    require_once('../model/departement.php');
    require_once('../model/pseudo.php');
    require_once('../model/lieu.php');
    require_once('../model/categorie.php');

    require_once('../model/region.php');



    if(!empty($_POST))
      {
        $ville=$_POST['ville'];
        $region=$_POST['region'];
        $depart=$_POST['depart'];





            if(empty($ville) && strcmp($region, "choisir1")==0 && strcmp($depart, "choisir2")==0){
              $lieux=getAllLieu();
            }
            else{
              if(!(strcmp($region, "choisir1")==0)){
                if(!(strcmp($depart, "choisir2")==0)){


                  if(!empty($ville)){
                      $idville=getIdVille($ville);
                      if(is_null($idville)){
                          $message="Il n y a rien à afficher pour votre selection";
                      }
                      else{
                        $lieux=getAllVilleDepartementRegionLieu($idville, $depart, $region);
                      }
                  }
                  else{
                    $lieux=getAllDepartementRegionLieu($depart, $region);
                  }
                }
                else{
                    if(!empty($ville)){
                      $idville=getIdVille($ville);
                      if(is_null($idville)){
                          $message="Il n y a rien à afficher pour votre selection";
                      }
                      else{
                        $lieux=getAllVilleRegionLieu($idville, $region);
                      }
                    }
                    else{
                      $lieux=getAllRegionLieu($region);
                    }

                }



                }
                else{
                    if(!(strcmp($depart, "choisir2")==0)){
                      if(!empty($ville)){
                        $idville=getIdVille($ville);
                        if(is_null($idville)){
                            $message="Il n y a rien à afficher pour votre selection";
                        }
                        else{
                          $lieux=getAllVilleDepartementLieu($idville, $depart, $region);
                        }
                      }
                      else{
                        $lieux=getAllDepartementLieu($depart);
                      }

                    }
                    else{
                        $idville=getIdVille($ville);
                        $lieux=getAllVilleLieu($idville);
                    }


                }
                }
        }






            if(is_null($lieux[0])){
              $message="Il n y a rien à afficher pour votre selection";
            }





            include('../view/essaie.php');
?>
