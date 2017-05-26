<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Modification du lieu</title>
<!--  Toutes les librairies/CSS/JS nécessaire à la mise en page et aux fonctionnalités de la page-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <link href="../view/ajoutlieu.css" rel="stylesheet">
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
<?php include('navbar.php');?>

  <body>
    <div class="container">
      <div class="row">
            <div class="col-md-6" >
            <h1 style="margin-top:100px">Modifier un lieu</h3>
              <!--  Affiche le message du controleur s'il existe-->

                <h3 style="margin-top:20px"><b>Le lieu <?php echo $nom ?> a bien été modifié</b></h1>




            </div>
      </div>
    </div>
  </body>

  </html>
