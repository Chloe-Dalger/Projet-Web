
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Modification du lieu</title>
  <!--  Toutes les librairies/CSS/JS nécessaire à la mise en page et aux fonctionnalités de la page-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <link href="../view/css/ajoutlieu.css" rel="stylesheet">

</head>

<body>
  <!--  Navbar de la page-->
  <?php include('navbar.php');?>

  <!-- Formulaire de modification du lieu avec les informations du lieu pré remplis -->
  <form action="modificationOK-<?php echo $nom; ?>" method="post">
    <div class="container">
      <div class="row">
        <div class="col-md-6" >
          <h1 style="margin-top:100px">Modifier un lieu</h3>
            <!--  Affiche le message du controleur s'il existe-->
            <?php if(!empty($message)) : ?>
              <h3 style="margin-top:20px"><b><?php echo $message; ?></b></h1>
              <?php endif; ?>


              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: MediumPurple;">
                  Nom lieu
                </span>
                <input type="text" maxlength="40" maxlength="40" name="nomlieu" id="nomlieu" value="<?php echo $nom; ?>">
              </div>


              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: LimeGreen;">
                  Description
                </span>

                <textarea  maxlength="500" name="description" cols="40" rows="5" ><?php echo $deslieu; ?></textarea>

              </div>
              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: GoldenRod;">
                  Ville
                </span>
                <input type="text" maxlength="40" name="ville" id="ville" value="<?php echo $nomville; ?>">
              </div>
              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: DarkCyan;">
                  Code Postal
                </span>
                <input type="text" maxlength="40" name="cpville" id="cpville" value="<?php echo $cpville; ?>">
              </div>
              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: SaddleBrown;">
                  Adresse Lieu
                </span>
                <input type="text" maxlength="40" name="adrlieu" id="adrlieu" value="<?php echo $adrlieu; ?>">
              </div>
              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: HotPink;">
                  URL Image
                </span>
                <input type="url" name="urlim" id="urlim" value="<?php echo $urllieu; ?>">
              </div>
              <br />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Crimson;">
                  Catégorie
                </span>
                <select name='ctegorie' class="form-control custom__select">
                  <option value="aucune">Aucune</option>
                  <?php

                  foreach ($categories as $categorie){
                    //on stocke le nom de la catégorie courante dans une variable
                    $nomcat1=$categorie['nomcat'];
                    //On fait un comparaison de chaine, si la catégorie courante est la catégorie du lieu à modifier alors on la choisi par défaut
                    if(strcmp($nomcat1, $nomcat) == 0){
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
