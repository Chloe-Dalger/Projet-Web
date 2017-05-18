<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8" />
<title>Contact</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="ajoutlieu.css">


<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
              <div class="adjust-nav">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                          <span class="icon-bar"></span>
                          <?php
                          // Si l'utilisateur n'est pas connecté on rajoute les boutons d'inscription et de connexion
                          if(!isset($_COOKIE["token"])){
                          ?>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          <?php
                          }
                          ?>
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

<form>
  <div class="container">
  	<div class="row">
          <div class="col-md-6" >
      		<h3 >Ajouter un nouveau lieu</h3>

              <div class="input-group" style="margin-top: 150px; ">
                <span class="input-group-addon custom__addon" style="background-color: DodgerBlue;">
                  <span class="glyphicon glyphicon-cog"></span>  Pseudo
                </span>
                <input type="text" maxlength="15" placeholder="Entrez votre nom/pseudo...">
              </div>
              <hr />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Crimson;">
                  <span class="glyphicon glyphicon-cog"></span>  Catégorie
                </span>
                <select class="form-control custom__select">
                  <option value="global">GLobal</option>
                  <option value="week">This Week</option>
                  <option value="month">This Month</option>
                  <option value="year">This Year</option>
              </select>
              </div>
              <hr />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Sienna;">
                  <span class="glyphicon glyphicon-cog"></span>  Région
                </span>
                <select class="form-control custom__select">
                  <option value="global">GLobal</option>
                  <option value="week">This Week</option>
                  <option value="month">This Month</option>
                  <option value="year">This Year</option>
              </select>
              </div>
              <hr />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: Gold;">
                  <span class="glyphicon glyphicon-cog"></span>  Ville
                </span>
                <input type="text" placeholder="Entrez la ville..." maxlength="40">
              </div>
              <hr />
              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: LimeGreen;">
                  <span class="glyphicon glyphicon-cog"></span>  Description
                </span>

                  <textarea name="Text1" cols="40" rows="5" placeholder="Entrez la description du lieu ici..."></textarea>

              </div>
              <hr/>

              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: MediumPurple;">
                  <span class="glyphicon glyphicon-cog"></span>  Image
                </span>
                <input type="url" placeholder="Entrez l'url de l'image ici...">
              </div>
              <hr />
              <input type="submit" value="Submit">
          </div>
  	</div>
  </div>


</form>

</body>

</html>

</html>
