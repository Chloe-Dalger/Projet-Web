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
                $nomregion=getNomRegion($region);
                if(!(strcmp($depart, "choisir2")==0)){
                  $nomdepart=getNomDepartement($depart);


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
                      $nomdepart=getNomDepartement($depart);
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


            $photoParPage=18; //Nous allons afficher 5 messages par page.

              global $db;
              try{
                  $req=$db->prepare('SELECT COUNT(*) FROM lieu');
                  $req->execute(array());
                  $TotalLieu=$req->fetchAll();
                } catch(PDOException $e){
                    echo($e->getMessage());
                    die(" Erreur lors de la récupération du nombre de lieux dans la base de données " );
              }




            //Nous allons maintenant compter le nombre de pages.
            $nombreDePages=ceil($TotalLieu[0]/$photoParPage);

            if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
            {
                 $pageActuelle=intval($_GET['page']);

                 if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                 {
                      $pageActuelle=$nombreDePages;
                 }
            }
            else // Sinon
            {
                 $pageActuelle=1; // La page actuelle est la n°1
            }

            $premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

            // La requête sql pour récupérer les messages de la page actuelle.
            $retour_messages=mysql_query('SELECT * FROM lieu ORDER BY id DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');




            include('../view/essaie.php');
?>
