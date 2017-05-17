
<?php


try {
$db = new PDO("pgsql:host=ec2-54-247-99-159.eu-west-1.compute.amazonaws.com;dbname=datiq8vdqi82oi", "xdydxxxhgjytuj", "5939c39225d5d0922adcf66cf0d70f11f5e0674a281daeafb0d62c80dced2c48");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo 'Connexion OK';
}
catch(PDOException $e) {
$db = null;
echo 'ERREUR DB: ' . $e->getMessage();
}
