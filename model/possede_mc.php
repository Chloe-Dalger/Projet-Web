<?php


function creerMotCle($idl, $idmc){
  //donnée : nom du mot clé
  //pré : nom : String & length(nom)>0
  //résultat : ajout du mot cle dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO possede_mc(idlieu, idmotcle) VALUES (?, ?)');
		$req->execute(array($idl, $idmc));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion de la region dans la base de données " );
}

}

function supprimerMotCleLieu($id){
  //donnée : id du mot cle à supprimer
	//pré : idmotcle: entier >0
	//résultat : suppression du mot cle de la base de données
  global $db;
  try{
    $req=$db->prepare('DELETE FROM possede_mc WHERE idmotcle=:id OR idlieu=:id');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du mot cle dans la base de données " );
  }
}



 ?>
