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

        $iddep=getIdDepartement($depart);
        $idregion=getIdRegion($region);



            if(empty($ville) && empty($region) && empty($depart)){
              $lieu=getAllLieu();
            }
            else{
              if(!empty($region) ){

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

                  }

                }
                else{

                }


            }
        }
      }


            include('../view/essaie.php');
?>
