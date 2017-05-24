
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
    <li><a  href="../controller/ajoutlieu_controller.php">Ajouter lieu</a></li>

  </ul>


  <form action="../controller/updatelieu_controller.php" method="post">
  <div class="container">
    <div class="row">
          <div class="col-md-6" >
          <h1 style="margin-top:100px">Modifier un lieu</h3>
          <?php if(!empty($message)) : ?>
              <h3 style="margin-top:20px"><b><?php echo $message; ?></b></h1>
            <?php endif; ?>


              <div class="input-group">
                <span class="input-group-addon custom__addon" style="background-color: MediumPurple;">
                  <span class="glyphicon glyphicon-cog"></span>  Nom lieu
                </span>
                <input type="text" maxlength="40" maxlength="40" name="nomlieu" id="nomlieu" value="<?php echo $nom; ?>">
              </div>

              <hr/>
              <br />
                <div class="input-group">
                  <span class="input-group-addon custom__addon" style="background-color: LimeGreen;">
                    <span class="glyphicon glyphicon-cog"></span>  Description
                  </span>

                    <textarea  maxlength="500" name="description" cols="40" rows="5" ><?php echo $deslieu; ?></textarea>

                </div>
  <br />



              <input type="submit" value="Submit">
          </div>
    </div>
  </div>


  </form>


</body>

</html>
