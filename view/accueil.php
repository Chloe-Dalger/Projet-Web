
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Bienvenue</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <link href="../view/accueil.css" rel="stylesheet">
  <link rel="stylesheet" href="../view/navbar.css">

  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>


  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="adjust-nav">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="icon-bar"></span>

          <span class="icon-bar"></span>
          <span class="icon-bar"></span>

          <span class="icon-bar"></span>
        </button>
        <li><a class="navbar-brand" href="Contact">Contact</a></li>

      </div>

      <ul class="nav navbar-nav navbar-left">
        <li><a href="accueil">Accueil</a></li>

        <li><a href="ajoutlieu">Ajouter un Lieu</a></li>
        <li><a href="connexionEtudiant.controller.php">Connexion</a></li>


      </ul>



    </div>
  </div>




  <div class="body-search">
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <h1 class="cover-heading">Trouve l'endroit de tes rêves</h1>
          <p class="lead">Rentre la ville, choisi la région ou le département et découvre les endroits à visiter!</p>



          <form method="post" action="rechercherlieu_controller.php">
            <select name="region" id="region">
              <option value="choisir1">Choisissez la Région</option>

              <?php
              foreach ($regions as $region){
                echo '<option value="'.$region['idregion'].'">'.$region['nomregion'].'</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
              }
              ?>

            </select>

            <select name="region" id="region">
              <option value="choisir2">Choisissez le Département</option>
              <?php
              foreach ($departs as $depart){
                echo '<option value="'.$depart['iddep'].'">'.$depart['nomdep'].' (<span class="badge badge-inverse">'.$depart['numerodep'].'</span>)</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
              }
              ?>

            </select>

            <div class="form-group">
              <div class="input-group input-group-md icon-addon addon-md">
                <input type="text" placeholder="Rechercher une ville..." name="" id="schbox" class="form-control">
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
