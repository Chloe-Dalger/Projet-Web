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



            include('../view/essaie.php');
?>
