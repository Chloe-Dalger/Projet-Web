
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Ajout d'un lieu</title>
  <!--  Toutes les librairies/CSS/JS dont on a besoin pour la mise en page et les fonctionalités de la page-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../bootstrap.min.js"></script> <!-- Essayer de virer -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <link href="../view/ajoutlieu.css" rel="stylesheet">

  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Essayer de virer -->
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

<!--  Navbar de la page-->
  <ul>
    <li><a  href="../controller/accueil_controller.php">Accueil</a></li>
    <li><a class="active" href="../controller/ajoutlieu_controller.php">Ajouter lieu</a></li>

  </ul>

  <!-- Formulaire d'ajout d'un lieu -->
  <form action="../controller/ajoutlieu_controller.php" method="post">
  <div class="container">
    <div class="row">
          <div class="col-md-6" >
          <h1 style="margin-top:100px">Ajouter un nouveau lieu</h3>
            <!-- Mesasge du controlleur s'il existe -->
          <?php if(!empty($message)) : ?>
              <h3 style="margin-top:20px"><b><?php echo $message; ?></b></h1>
            <?php endif; ?>

              <div class="input-group" style="margin-top: 100px; ">
                <span class="input-group-addon custom__addon" style="background-color: DodgerBlue;">
                  Pseudo
                </span>
                <!-- Input text pour rentrer son pseudo avec un maximum de 15 caractères -->
                <input type="text" maxlength="15" placeholder="Entrez votre nom/pseudo..." name="pseudo" id="pseudo" value="<?php if(!empty($_POST['pseudo'])) { echo htmlspecialchars($_POST['pseudo'], ENT_QUOTES); } ?>">
              </div>
            <br />

              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: MediumPurple;">
                  Nom lieu
                </span>
                <!-- Input text pour rentrer le nom du lieu avec un maximum de 40 caractères1 -->
                <input type="text" maxlength="40" placeholder="Entrez le nom du lieu ici..." maxlength="40" name="nomlieu" id="nomlieu" value="<?php if(!empty($_POST['nomlieu'])) { echo htmlspecialchars($_POST['nomlieu'], ENT_QUOTES); } ?>">
              </div>
            <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: LimeGreen;">
                  Description
                </span>
                  <!-- Textare pour la description du lieu, avec colonnes et 5 lignes   -->
                  <textarea  maxlength="500" name="description" cols="40" rows="5" placeholder="Entrez la description du lieu ici..." value="<?php if(!empty($_POST['description'])) { echo htmlspecialchars($_POST['description'], ENT_QUOTES); } ?>"></textarea>

              </div>
<br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Gold;">
                 Ville
                </span>
                <!-- Input text pour entrer la nom de la ville avec une longueur ed 40 caractères max -->
                <input type="text" placeholder="Entrez la ville ici..." maxlength="40" name="ville" id="ville" value="<?php if(!empty($_POST['ville'])) { echo htmlspecialchars($_POST['ville'], ENT_QUOTES); } ?>">
              </div>
<br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: DarkCyan;">
                Code Postal
                </span>
                <!-- Input text pour rentrer le code postal de la ville avec une longueur max de 40 caractères -->
                <input type="text" placeholder="Entrez le code postal ici..." maxlength="40" name="cpville" id="cpville" value="<?php if(!empty($_POST['cpville'])) { echo htmlspecialchars($_POST['cpville'], ENT_QUOTES); } ?>">
              </div>
<br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Wheat;">
                Adresse Lieu
                </span>
                <!--  Input text pour entrer l'adresse du lieu avec 40 caratères max-->
                <input type="text" placeholder="Entrez l''adresse de la ville ici..." maxlength="40" name="adrlieu" id="adrlieu" value="<?php if(!empty($_POST['adrlieu'])) { echo htmlspecialchars($_POST['adrlieu'], ENT_QUOTES); } ?>">
              </div>
              <br />
              <div class="input-group">

                <span class="input-group-addon custom__addon" style="background-color: HotPink;">
                  URL Image
                </span>
                <!-- Input url pour entrer l'url de l'image du lieu vérifications à faire -->
                <input type="url" placeholder="Entrez l'url de l'image ici..." name="urlim" id="urlim" value="<?php if(!empty($_POST['urlim'])) { echo htmlspecialchars($_POST['urlim'], ENT_QUOTES); } ?>">
              </div>
<br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Crimson;">
                Catégorie
                </span>
                <select name='ctegorie' class="form-control custom__select">
                  <!-- Menu déroulant affichant toutes les catégories de la base de données, aucune à rajouter dans la BD!! -->
                  <option value="aucune">Aucune</option>
                  <?php
                  //categories tableau à double entrée qui pour chaque ligne va afficher un certain nombre d'informations
                  foreach ($categories as $categorie){
                    echo '<option value="'.$categorie['nomcat'].'">'.$categorie['nomcat'].'</option>';
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
