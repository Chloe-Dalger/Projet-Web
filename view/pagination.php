
<html>
<head>
<title>Exemple de pagination automatique sur un livre d or</title>
</head>
<body>
<?php
//Connexion à la base de données
mysql_connect('serveur', 'utilisateur', 'motdepasse');
mysql_select_db('basededonnees');



while($donnees_messages=mysql_fetch_assoc($retour_messages)) // On lit les entrées une à une grâce à une boucle
{
     //Je vais afficher les messages dans des petits tableaux. C'est à vous d'adapter pour votre design...
     //De plus j'ajoute aussi un nl2br pour prendre en compte les sauts à la ligne dans le message.
     echo '<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                     <td><strong>Ecrit par : '.stripslashes($donnees_messages['pseudo']).'</strong></td>
                </tr>
                <tr>
                     <td>'.nl2br(stripslashes($donnees_messages['message'])).'</td>
                </tr>
            </table><br /><br />';
    //J'ai rajouté des sauts à la ligne pour espacer les messages.
}

echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] ';
     }
     else //Sinon...
     {
          echo ' <a href="livredor.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
?>
</body>
</html>
