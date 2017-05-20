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
                  $lieu=getAllDepartementLieu($iddep);
              }
            }


      }


            include('../view/essaie.php');
?>
