<?php
require_once('../model/DBconnect.php');
require_once('../model/ville.php');
require_once('../model/departement.php');
require_once('../model/pseudo.php');
require_once('../model/lieu.php');
require_once('../model/categorie.php');

require_once('../model/region.php');


$nom=$_GET['nom'];
$idlieu=getIdLieu($nom);
$idville=getIdVilleLieu($idlieu);
$idpseudo=getIdPseudoLieu($idlieu);
$adrlieu=getAdresseLieu($idlieu);
$deslieu=getDescriptionLieu($idlieu);
$urllieu=getUrlLieu($idlieu);
$cpville=getCodePostalVille($idville);
$nomville=getNomVille($idville);
$pseudo=getPseudo($idpseudo);


include('../view/affichagedulieu.php');

?>
