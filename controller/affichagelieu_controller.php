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
              $lieu=getAllLieu();
            }
            else{
              if(!empty($region) ){
                $lieu=getAllRegionLieu($region);

              }
            }


      }


            include('../view/essaie.php');
?>
