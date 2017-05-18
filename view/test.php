
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Bienvenu</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" href="accueil.css">
<link rel="stylesheet" href="navbar.css">

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin-top:20px;

    background: url(http://www.nue-propriete.org/wp-content/uploads/2016/06/Nue-propri%C3%A9t%C3%A9-Montpellier-34-1024x686.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;

    height: 100%;
    background-color: #060;
    text-align: center;
    text-shadow: 0 1px 3px rgba(0,0,0,.5);
}
a,
a:focus,
a:hover {
  color: #fff;
}

/* Custom default button */
.btn-default,
.btn-default:hover,
.btn-default:focus {
  color: #333;
  text-shadow: none; /* Prevent inheritence from `body` */
  background-color: #fff;
  border: 1px solid #fff;
}




/* Extra markup and styles for table-esque vertical and horizontal centering */
.site-wrapper {
  display: table;
  height: 100%; /* For at least Firefox */
  margin-top: 150px;
  margin-left: 300px;

}

.cover-container {
  margin-right: auto;
  margin-left: auto;
}

/* Padding for spacing */
.inner {
  padding: 30px;
}


/*
 * Header
 */


@media (min-width: 992px) {
  .masthead,
  .mastfoot,
  .cover-container {
    width: 700px;
  }
}
</style>

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
                        <li><a href="accueil">Accueil</a></li>

                            <li><a href="ajoutlieu">Ajouter un Lieu</a></li>
                            <li><a href="connexionEtudiant.controller.php">Connexion</a></li>


                      </ul>



              </div>
  </div>




  <div class="body-search">
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                  <div class="cover-container">

                        <h1 class="cover-heading">Trouve l'endroit de tes rêves</h1>
                        <p class="lead">Rentre la ville, choisi la région ou le département et découvre les endroits à visiter!</p>



                        <form method="post" action="traitement.php">
                               <select name="region" id="region">
                                   <option value="choisir1">Choisissez Région</option>

                                     <?php
                                         foreach ($regions as $region){
                                           echo '<option value="'.$region['idregion'].'">'.$region['nomregion'].'</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
                                         }
                                     ?>

                                  </select>

                                    <select name="region" id="region">
                                        <option value="choisir2">Choisissez votre Département</option>
                                               <?php
                                                   foreach ($departs as $depart){
                                                     echo '<option value="'.$depart['iddep'].'">'.$depart['nomdep'].' (<span class="badge badge-inverse">'.$depart['numerodep'].'</span>)</option>'; //Affiche chaque nom (ex: Informatique et Gestion) de chaque département de la base de données
                                                   }
                                               ?>

                                     </select>

                                     <div class="form-group">
    <div class="input-group input-group-md icon-addon addon-md">
        <input type="text" placeholder="Texte" name="" id="schbox" class="form-control">
        <i class="icon icon-search"></i>
        <span class="input-group-btn">
            <button type="submit" class="btn btn-inverse">Rechercher</button>
        </span>
    </div>
</div>

                                   </form>

                                    </div>

                            </div>
                        </div>
                    </div>
                  </div>

              </body>

            </html>



</html>
