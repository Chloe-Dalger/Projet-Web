    <?php
      require_once('../model/DBconnect.php');
      require_once('../model/ville.php');
      require_once('../model/departement.php');
      require_once('../model/pseudo.php');
      require_once('../model/lieu.php');
      require_once('../model/categorie.php');
      require_once('../model/mot_cle.php');
      require_once('../model/possede_mc.php');
      require_once('../model/region.php');
      require_once('../model/essaie.php');

          $ville=$_POST['ville'];
          $region=$_POST['region'];
          $depart=$_POST['depart'];

          $iddep=getIdDepartement($depart);
          $idregion=getIdRegion($region);

          if(!empty($_POST))
            {

                  if(empty($ville) && empty($region) && empty($depart)){
                    $lieu=getAllLieu();
                  }
                  else{
                    if(!empty($region) ){
                      if(!empty($departement)){
                        if(!empty($ville)){
                            $idville=getIdVille($ville);
                            if(is_null($idville)){

                                $message="Il n y a rien à afficher pour votre selection";
                            }
                            else{
                              $lieu=getAllVilleDepartementRegionLieu($idville, $iddep, $idregion);
                            }
                        }
                        else{
                          $lieu=getAllDepartementRegionLieu($iddep, $idregion);
                        }

                      }
                      else{
                        if(!empty($ville)){
                          $idville=getIdVille($ville);
                          if(is_null($idville)){
                              $message="Il n y a rien à afficher pour votre selection";
                          }
                          else{
                            $lieu=getAllVilleRegionLieu($idville, $idregion);
                          }
                        }
                        else{
                          $lieu=getAllRegionLieu($idregion);
                        }

                      }

                    }
                    else{
                      if(!empty($departement)){
                        if(!empty($ville)){
                          $idville=getIdVille($ville);
                          if(is_null($idville)){
                              $message="Il n y a rien à afficher pour votre selection";
                          }
                          else{
                            $lieu=getAllVilleDepartementLieu($idville, $iddep, $idregion);
                          }
                        }
                        else{
                          $lieu=getAllDepartementLieu($iddep);
                        }

                      }
                      else{
                          $lieu=getAllVilleLieu($idville);
                      }


                  }
              }
            }


            include('../view/essaie.php');
?>
