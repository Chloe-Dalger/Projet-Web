<!DOCTYPE html>
<html>
<head>
  <title>Lieux</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"><!--  Voir ce que c'est-->
  <!-- Toutes les librairies/CSS/JS dont on a besoin pour la mise en page et pour  -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../view/css/affichage.css" rel="stylesheet">

</head>





<body class="w3-light-grey w3-content" style="max-width:2000px">
  <!-- Navbar de la page -->
  <?php include('navbar.php');?>


  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:50px">

    <!-- Header -->
    <header id="Gallery">



      <h1><b> Résultats de votre recherche:</b></h1>

      <!-- Affiche les filtres que l'on a choisi, à savoir, departement, région, ville -->
      <div class="w3-section w3-bottombar w3-padding-16">
        <span class="w3-margin-right ">Filtres:</span>

        <?php if(!empty($ville)) : ?>
          <button class="w3-button w3-black"><?php echo $ville; ?></button>
        <?php endif; ?>
        <?php if(!(strcmp($depart, "choisir2")==0)) : ?>
          <button class="w3-button w3-black"><?php echo $nomdepart; ?></button>
        <?php endif; ?>
        <?php if(!(strcmp($region, "choisir1")==0)) : ?>
          <button class="w3-button w3-black"><?php echo $nomregion; ?></button>
        <?php endif; ?>

      </div>

    </header>


  </div>
  <!-- Affiche le message du controller -->
  <?php if(!empty($message)) : ?>
    <h1><b><?php echo $message; ?></b></h1>
  <?php endif; ?>


  <div class="w3-row-padding">
    <?php
    //Lieux tableau à double entrée, pour chaque ligne de lieux, on va afficher certaines informations
    foreach ($lieux as $lieu){ ?>
      <div class="w3-third w3-container w3-margin-bottom">
        <?php echo '<a href="lieux-'.$lieu['nomlieu'].'">';?>
          <?php

          echo '<img src="'.$lieu['urllieu'].'" style="width:100%; height: 100%;"" class="w3-hover-opacity">';
          ?>
        </a>
        <div class="w3-container w3-white">
          <p><b><?php echo $lieu['nomlieu']; ?></b></p>
          <p><?php echo $lieu['deslieu']; ?></p>
        </div>
      </div>
      <?php }
      ?>

    </div>

  </body>
  </html>
