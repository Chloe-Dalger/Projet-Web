
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
  <style>
  body{font-family: "Raleway", sans-serif;
  background-image: url("http://subtlepatterns.com/patterns/wood_pattern.png");
  background-repeat: repeat;}

  ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
      position: fixed;
      top: 0;
      width: 100%;
  }

  li {
      float: left;
  }

  li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
  }

  li a:hover:not(.active) {
      background-color: #111;
  }

  .active {
      background-color: #4CAF50;
  }
  </style>


</head>

<body>

  <ul>
    <li><a  href="../controller/accueil_controller.php">Accueil</a></li>
    <li><a class="active" href="../controller/ajoutlieu_controller.php">Ajouter lieu</a></li>

  </ul>



  <form action="../controller/ajoutlieu_controller.php" method="post">
  <div class="container">
    <div class="row">
          <div class="col-md-6" >
          <h3 >Ajouter un nouveau lieu</h3>

              <div class="input-group" style="margin-top: 150px; ">
                <span class="input-group-addon custom__addon" style="background-color: DodgerBlue;">
                  <span class="glyphicon glyphicon-cog"></span>  Pseudo
                </span>
                <input type="text" maxlength="15" placeholder="Entrez votre nom/pseudo..." name="pseudo" id="pseudo" value=""<?php if(!empty($_POST['pseudo'])) { echo htmlspecialchars($_POST['pseudo'], ENT_QUOTES); } ?>"">
              </div>

              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Gold;">
                  <span class="glyphicon glyphicon-cog"></span>  Nom lieu
                </span>
                <input type="text" maxlength="40" placeholder="Entrez la ville..." maxlength="40" name="nomlieu" id="nomlieu" value=""<?php if(!empty($_POST['nomlieu'])) { echo htmlspecialchars($_POST['nomlieu'], ENT_QUOTES); } ?>"">
              </div>

              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: LimeGreen;">
                  <span class="glyphicon glyphicon-cog"></span>  Description
                </span>

                  <textarea  maxlength="500" name="description" cols="40" rows="5" placeholder="Entrez la description du lieu ici..."></textarea>

              </div>

              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Gold;">
                  <span class="glyphicon glyphicon-cog"></span>  Ville
                </span>
                <input type="text" placeholder="Entrez la ville ici..." maxlength="40" name="ville" id="ville" value=""<?php if(!empty($_POST['ville'])) { echo htmlspecialchars($_POST['ville'], ENT_QUOTES); } ?>"">
              </div>

              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Gold;">
                  <span class="glyphicon glyphicon-cog"></span>  Code Postal
                </span>
                <input type="text" placeholder="Entrez le code postal ici..." maxlength="40" name="cpville" id="cpville" value=""<?php if(!empty($_POST['cpville'])) { echo htmlspecialchars($_POST['cpville'], ENT_QUOTES); } ?>"">
              </div>

              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Gold;">
                  <span class="glyphicon glyphicon-cog"></span>  Adresse Lieu
                </span>
                <input type="text" placeholder="Entrez la ville..." maxlength="40" name="adrlieu" id="adrlieu" value=""<?php if(!empty($_POST['adrlieu'])) { echo htmlspecialchars($_POST['adrlieu'], ENT_QUOTES); } ?>"">
              </div>

              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: MediumPurple;">
                  <span class="glyphicon glyphicon-cog"></span>  URL Image
                </span>
                <input type="url" placeholder="Entrez l'url de l'image ici..." name="urlim" id="urlim" value=""<?php if(!empty($_POST['urlim'])) { echo htmlspecialchars($_POST['urlim'], ENT_QUOTES); } ?>"">
              </div>

              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Crimson;">
                  <span class="glyphicon glyphicon-cog"></span>  Catégorie
                </span>
                <select name='ctegorie' class="form-control custom__select">
                  <option value="aucune">Aucune</option>
                  <?php
                  foreach ($categories as $categorie){
                    echo '<option value="'.$categorie['nomcat'].'">'.$categorie['nomcat'].'</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
                  }
                  ?>
              </select>

              </div>
              <hr/>


              <input type="submit" value="Submit">
          </div>
    </div>
  </div>


  </form>


</body>

</html>
