
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Bienvenu</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <link href="../view/ajoutlieu.css" rel="stylesheet">
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
        <li><a href="../controller/accueil_controller.php">Accueil</a></li>

        <li><a href="../controller/ajoutlieu_controller.php">Ajouter un Lieu</a></li>
        <li><a href="connexionEtudiant.controller.php">Connexion</a></li>


      </ul>



    </div>
  </div>



  <form action="../controller/ajoutlieu_controller.php" method="post">
  <div class="container">
    <div class="row">
          <div class="col-md-6" >
          <h3 >Ajouter un nouveau lieu</h3>


              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Crimson;">
                  <span class="glyphicon glyphicon-cog"></span>  Catégorie
                </span>
                <select class="form-control custom__select">
                  <option value="aucune">Aucune</option>
                  <?php
                  foreach ($categories as $categorie){
                    echo '<option value="'.$categorie['idcat'].'">'.$categorie['nomcat'].'</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
                  }
                  ?>
              </select>
            </div>




              <input type="submit" value="Submit">
          </div>
    </div>
  </div>


  </form>


</body>

</html>
