
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Bienvenue</title>

  <!-- Toutes les librairies/CSS etJS dont on a besoins pour l'esthétique de la page -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../bootstrap.min.js"></script> <!--  Essayer d'enlever-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="../view/css/accueil.css" rel="stylesheet">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"><!-- essayer d'enlever -->


</head>

<body>

  <!-- La navbar de la page -->
  <ul>
    <li><a class="active" href="../controller/accueil_controller.php">Accueil</a></li>
    <li><a href="ajoutlieu">Ajouter lieu</a></li>

  </ul>




  <div class="body-search">
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <h1 class="cover-heading">Trouve l'endroit de tes rêves</h1>
          <p class="lead">Rentre la ville, choisi la région ou le département et découvre les endroits à visiter!</p>


          <!--  Formulaire de recher de lieux pour déterminer la zone géographique recherchée-->
          <form method="post" action="affichagelieu_controller.php">
            <!--  Un menu déroulant affichant toutes les regions de la base de données-->
            <select name="region" id="region">
              <option value="choisir1" selected="selected">Choisissez la Région</option>

              <?php
              //Prends le tableau à double entrée regions, et pour chaque ligne il va afficher certaine informations des colonnes demandées
              foreach ($regions as $region){
                echo '<option value="'.$region['idregion'].'">'.$region['nomregion'].'</option>';
              }
              ?>

            </select>

            <!--  Manu déroulant affichant tous les départements de la base de données-->
            <select name="depart" id="depart">
              <option value="choisir2" selected="selected">Choisissez le Département</option>
              <?php
              //Prends le tableau à double entrée departs, et pour chaque ligne il va afficher certaine informations des colonnes demandées

              foreach ($departs as $depart){
                echo '<option value="'.$depart['iddep'].'">'.$depart['nomdep'].' (<span class="badge badge-inverse">'.$depart['numerodep'].'</span>)</option>';
              }
              ?>

            </select>
            <!-- Une entrée text pour reccueillir la ville voulue -->
            <div class="form-group">
              <div class="input-group input-group-md icon-addon addon-md">
                <input type="text" placeholder="Rechercher une ville..." name="ville" id="schbox" class="form-control" value="<?php if(!empty($_POST['ville'])) { echo htmlspecialchars($_POST['ville'], ENT_QUOTES); } ?>">
                <i class="icon icon-search"></i>
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-inverse">Rechercher</button>
                </span>
              </div>
            </div>

          </form>

        </div>

      </div>
    </div>
  </div>

</body>

</html>



</html>
