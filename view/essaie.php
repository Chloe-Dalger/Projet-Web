<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
header{
  margin-bottom: 30px;
}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

  <!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="Gallery">



    <h1><b>Résultats de votre recherche:</b></h1>

    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filtres:</span>

      <?php if(!empty($ville)) : ?>
          <button class="w3-button w3-black"><?php echo $ville; ?></button>
        <?php endif; ?>
        <?php if(!(strcmp($depart, "choisir2")==0)) : ?>
            <button class="w3-button w3-black"><?php echo $nomdepart; ?></button>
          <?php endif; ?>
          <?php if(!(strcmp($region, "choisir1")==0)) : ?>
              <button class="w3-button w3-black"><?php echo $nomregion; ?></button>
            <?php endif; ?>


  </header>
      <!-- Si jamais j'utilise des mots clés
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i>Design</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i>Photos</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i>Art</button> -->
    </div>
    </div>

    <?php if(!empty($message)) : ?>
        <h1><b><?php echo $message; ?></b></h1>
      <?php endif; ?>

  <!-- First Photo Grid-->
  <div class="w3-row-padding">
    <?php
    foreach ($lieux as $lieu){ ?>
    <div class="w3-third w3-container w3-margin-bottom">
      <?php

        echo '<img src="'.$lieu['urllieu'].'" style="width:100%" class="w3-hover-opacity">';
      ?> <div class="w3-container w3-white">
        <p><b><?php echo $lieu['nomlieu']; ?></b></p>
        <p><?php echo $lieu['deslieu']; ?></p>
      </div>
    </div>
  <?php }
    ?>

  </div>


</body>
</html>
