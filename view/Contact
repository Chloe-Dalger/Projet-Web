<html>
<head>
<meta charset="utf-8" />
<title>Contact</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="contact.css">

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

<section id="contact" style="" >
            <div class="container">
                <div class="row">
                    <div class="about_our_company" style="margin-top: 300px;">
                        <h1 style="color:#fff;">Write Your Message</h1>
                        <div class="titleline-icon"></div>
                        <p style="color:#fff;">Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <form name="sentMessage" id="contactForm" novalidate="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Your Phone *"  id="phone" required="" data-validation-required-message="Please enter your phone number.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button type="submit" class="btn btn-xl get" style="margin-bottom: 300px;">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <p style="color:#fff;">
                            <strong><i class="fa fa-map-marker"></i> Address</strong><br>
                            1216/Mirpur_10 Beach, Dhaka(Bangladesh)
                        </p>
                        <p style="color:#fff;"><strong><i class="fa fa-phone"></i> Phone Number</strong><br>
                            (+8801)7123456</p>
                        <p style="color:#fff;">
                            <strong><i class="fa fa-envelope"></i>  Email Address</strong><br>
                            Email@info.com</p>
                        <p></p>
                    </div>
                </div>
            </div>
        </section>

</body>
</html>
