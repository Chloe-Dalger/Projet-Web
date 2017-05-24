
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





</body>

</html>
