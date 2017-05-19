<?php

function existeMotCleLieu($idmc, $idl){
  //données : mot cle
	//pré : lib: String
	//résultat : id du mot cle s'il existe, NULL sinon
	//post : idmotcle : entier >0 ou NULL
  global $db;
	try{
		$req=$db->prepare('SELECT idmotcle FROM possede_mc WHERE idmotcle=? AND idlieu=? ');
		$req->execute(array($idmc, $idl));
		$idmotcle=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence du mot cle dans la table " );
}
		return $idmotcle[0];

}





function supprimerMCLieu($id){
  //donnée : id du lieu à supprimer
	//pré : idlieu : entier >0
	//résultat : suppression du lieu de la base de données
  global $db;
  try{
    $req=$db->prepare('DELETE FROM possede_mc WHERE idmotcle=? OR idlieu=:id');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du lieu dans la base de données " );
  }
}


 ?>
