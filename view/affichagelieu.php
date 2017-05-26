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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif;
background-image: url("http://subtlepatterns.com/patterns/wood_pattern.png");
background-repeat: repeat;}
body{background-image: url("http://subtlepatterns.com/patterns/wood_pattern.png");
background-repeat: repeat;}

}
header{
  margin-bottom: 30px;
}

body {margin:0;}

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
            <form action="lieux" method="post">
            <select name="ctg" class="selectpicker" data-style="btn-warning">
              <!-- Menu déroulant affichant toutes les catégories de la base de données -->
              <?php
              //categories tableau à double entrée qui pour chaque ligne va afficher un certain nombre d'informations
              foreach ($categories as $categorie){
                echo '<option value="'.$categorie['nomcat'].'">'.$categorie['nomcat'].'</option>';
              }
              ?>
            </select>
            <input type="submit" value="Choisir">
          </form>

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
        foreach ($lieux as $lieu){

        ?>
      <div class="w3-third w3-container w3-margin-bottom">
        <?php echo '<a href="lieux/'.$lieu['nomlieu'].'">';?>
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

<!-- Limiter le nombre à l'affichage -->
</body>
</html>
