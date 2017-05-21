
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Bienvenue</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <link href="../view/css/accueil.css" rel="stylesheet">

  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>


    <ul>
      <li><a class="active" href="../controller/accueil_controller.php">Accueil</a></li>
      <li><a href="../controller/ajoutlieu_controller.php">Ajouter lieu</a></li>

    </ul>




  <div class="body-search">
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <h1 class="cover-heading">Trouve l'endroit de tes rêves</h1>
          <p class="lead">Rentre la ville, choisi la région ou le département et découvre les endroits à visiter!</p>



          <form method="post" action="affichagelieu_controller.php">
            <select name="region" id="region">
              <option value="choisir1" selected="selected">Choisissez la Région</option>

              <?php
              foreach ($regions as $region){
                echo '<option value="'.$region['idregion'].'">'.$region['nomregion'].'</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
              }
              ?>

            </select>

            <select name="depart" id="depart">
              <option value="choisir2" selected="selected">Choisissez le Département</option>
              <?php
              foreach ($departs as $depart){
                echo '<option value="'.$depart['iddep'].'">'.$depart['nomdep'].' (<span class="badge badge-inverse">'.$depart['numerodep'].'</span>)</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
              }
              ?>

            </select>

            <div class="form-group">
              <div class="input-group input-group-md icon-addon addon-md">
                <input type="text" placeholder="Rechercher une ville..." name="ville" id="schbox" class="form-control">
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
