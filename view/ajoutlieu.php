
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Ajout d'un lieu</title>
  <!--  Toutes les librairies/CSS/JS dont on a besoin pour la mise en page et les fonctionalités de la page-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <link href="../view/css/ajoutlieu.css" rel="stylesheet">


</head>

<body>

  <!--  Navbar de la page-->
  <ul>
    <li><a  href="accueil">Accueil</a></li>
    <li><a class="active" href="ajoutlieu">Ajouter lieu</a></li>

  </ul>

  <!-- Formulaire d'ajout d'un lieu -->
  <form action="ajoutlieu" method="post">
    <div class="container">
      <div class="row">
        <div class="col-md-6" >
          <h1 style="margin-top:100px">Ajouter un nouveau lieu</h3>
            <!-- Message du controlleur s'il existe -->
            <?php if(!empty($message)) : ?>
              <h3 style="margin-top:20px"><b><?php echo $message; ?></b></h1>
              <?php endif; ?>

              <div class="input-group" style="margin-top: 100px; ">
                <span class="input-group-addon custom__addon" style="background-color: DodgerBlue;">
                  Pseudo
                </span>
                <!-- Input text pour rentrer son pseudo avec un maximum de 20 caractères -->
                <input type="text" maxlength="20" placeholder="Entrez votre nom/pseudo..." name="pseudo" id="pseudo" value="<?php if(!empty($_POST['pseudo'])) { echo htmlspecialchars($_POST['pseudo'], ENT_QUOTES); } ?>">
              </div>
              <br />

              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: MediumPurple;">
                  Nom lieu
                </span>
                <!-- Input text pour rentrer le nom du lieu avec un maximum de 50 caractères -->
                <input type="text" maxlength="50" placeholder="Entrez le nom du lieu ici..." maxlength="40" name="nomlieu" id="nomlieu" value="<?php if(!empty($_POST['nomlieu'])) { echo htmlspecialchars($_POST['nomlieu'], ENT_QUOTES); } ?>">
              </div>
              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: LimeGreen;">
                  Description
                </span>
                <!-- Textare pour la description du lieu, avec 40 colonnes et 5 lignes   -->
                <textarea  maxlength="700" name="description" cols="40" rows="5" placeholder="Entrez la description du lieu ici..." value="<?php if(!empty($_POST['description'])) { echo htmlspecialchars($_POST['description'], ENT_QUOTES); } ?>"></textarea>

              </div>
              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: GoldenRod;">
                  Ville
                </span>
                <!-- Input text pour entrer la nom de la ville avec une longueur ed 50 caractères max -->
                <input type="text" placeholder="Entrez la ville ici..." maxlength="50" name="ville" id="ville" value="<?php if(!empty($_POST['ville'])) { echo htmlspecialchars($_POST['ville'], ENT_QUOTES); } ?>">
              </div>
              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: DarkCyan;">
                  Code Postal
                </span>
                <!-- Input text pour rentrer le code postal de la ville avec une longueur max de 5 caractères -->
                <input type="text" placeholder="Entrez le code postal ici..." maxlength="5" name="cpville" id="cpville" value="<?php if(!empty($_POST['cpville'])) { echo htmlspecialchars($_POST['cpville'], ENT_QUOTES); } ?>">
              </div>
              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: SaddleBrown;">
                  Adresse Lieu
                </span>
                <!--  Input text pour entrer l'adresse du lieu avec 100 caratères max-->
                <input type="text" placeholder="Entrez l''adresse de la ville ici..." maxlength="100" name="adrlieu" id="adrlieu" value="<?php if(!empty($_POST['adrlieu'])) { echo htmlspecialchars($_POST['adrlieu'], ENT_QUOTES); } ?>">
              </div>
              <br />
              <div class="input-group">

                <span class="input-group-addon custom__addon" style="background-color: HotPink;">
                  URL Image
                </span>
                <!-- Input url pour entrer l'url de l'image du lieu vérifications à faire -->
                <input type="url" maclength="100" placeholder="Entrez l'url de l'image ici..." name="urlim" id="urlim" value="<?php if(!empty($_POST['urlim'])) { echo htmlspecialchars($_POST['urlim'], ENT_QUOTES); } ?>">
              </div>
              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Crimson;">
                  Catégorie
                </span>
                <select name='ctegorie' class="form-control custom__select">
                  <!-- Menu déroulant affichant toutes les catégories de la base de données -->
                  <?php
                  //categories tableau à double entrée qui pour chaque ligne va afficher un certain nombre d'informations
                  foreach ($categories as $categorie){

                    $nomcat1=$categorie['nomcat'];
                    $nomcat2='Aucune';

                    if(strcmp($nomcat1, $nomcat2) == 0){
                      echo '<option selected value="'.$categorie['nomcat'].'">'.$categorie['nomcat'].'</option>';
                    }else{
                    echo '<option value="'.$categorie['nomcat'].'">'.$categorie['nomcat'].'</option>';
                  }
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
