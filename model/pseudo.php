<?php

function getPseudo($id){
  //donnée: id du pseudo
	//pré : idpseudo : entier > 0
	//résultat : le pseudo correspondant à l'id donné en paramètre
	//post : pseudo : String ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT pseudo FROM pseudo WHERE idpseudo=?');
    $req->execute(array($id));
		$pseudo=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du Pseudo dans la base de données " );
		}
    return $pseudo[0];
}




function getIdPseudo($pseudo){
  //donnée: un pseudo
	//pré : pseudo : String & length(pseudo)>0
	//résultat : l'id correspondant au pseudo donné en paramètre
	//post : idpseudo: entier>0 ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT idpseudo FROM pseudo WHERE pseudo=?');
    $req->execute(array($pseudo));
		$idpseudo=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du pseudo dans la base de données " );
		}
    return $idpseudo[0];
}

function supprimerPseudo($id){
  //donnée : id du pseudo à supprimer
	//pré : idpseudo : entier >0
	//résultat : suppression du pseudo de la base de données
  global $db;
  try{
    $req=$db->prepare('DELETE FROM pseudo WHERE idpseudo=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du pseudo dans la base de données " );
  }

}

function creerPseudo($nom){
	//donnée : un pseudo
	//pré : nom : String & length(nom)>0
	//résultat : ajout du pseudo dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO pseudo(pseudo) VALUES (?)');
		$req->execute(array($nom));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion du pseudo dans la base de données " );
}

}

function getAllPseudo(){
  //résultat : Tous les pseudos de la base de données
  //post : Listepseudo : array : une ligne par pseudo, (idpseudo, pseudo) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM pseudo');
  		$req->execute(array());
  		$Listepseudo=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des pseudos dans la base de données " );
  }
      return $Listepseudo;
  }

  function getAllLieuPseudo($psd){
  	//données : un pseudo
  	//pré : pseudo: String & length(pseudo)>0
  	//résultat : Tous les lieux postés par le pseudo donné en paramètre
  	//post : Listelieupseudo : array : une ligne par lieu, (nomlieu, urllieu, deslieu, adrlieu) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomlieu, urllieu, deslieu, adrlieu FROM pseudo, lieu WHERE pseudo=? AND pseudo.idpseudo=lieu.idpseudo');
    		$req->execute(array());
    		$Listelieupseudo=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des lieu d'un pseudo dans la base de données " );
    }
        return $Listelieupseudo;
    }

  function modifPseudo($id, $newpseudo){
  	//donnée : id du pseudo de base et le nouveau pseudo
  	//pré : idpseudo : entier > 0 / newpseudo : String & length(newpseudo)>0
  	//résultat : modifie le pseudo actuel avec le nouveau pseudo
    global $db;
    try{
  		$req=$db->prepare('UPDATE pseudo SET pseudo= :newpseudo WHERE idpseudo=:id');
  		$req->execute(array(
  			'newpseudo' => $newpseudo,
  			'idpseudo' => $id
  		));
  	} catch(PDOException $e){
  		echo($e->getMessage());
  		die(" Erreur lors de la modification du pseudo de la categorie dans la table " );
  }
  }



function existePseudo($nom){
  //données : nom du pseudo
	//pré : nom: String
	//résultat : id du pseudo s'il existe, NULL sinon
	//post : idpseudo : entier >0 ou NULL
  global $db;
	try{
		$req=$db->prepare('SELECT idpseudo FROM pseudo WHERE pseudo=?');
		$req->execute(array($nom));
		$idpseudo=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence de la categorie dans la table " );
}
		return $idpseudo[0];

}










 ?>
