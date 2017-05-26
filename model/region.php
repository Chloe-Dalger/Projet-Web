<?php

function getNomRegion($id){
  //donnée: id de la region
	//pré : idregion : entier > 0
	//résultat : le nom correspondant à l'id donné en paramètre
	//post : nomregion : String  ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT nomregion FROM region WHERE idregion=?');
    $req->execute(array($id));
		$nomregion=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom de la region dans la base de données " );
		}
    return $nomregion[0];
}




function getIdRegion($nomregion){
  //donnée: nom de la region
	//pré : nom : String & length(nom)>0
	//résultat : l'id correspondant à la region donnée en paramètre
	//post : idregion: entier>0 ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT idregion FROM region WHERE nomregion=?');
    $req->execute(array($nomregion));
		$idregion=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id de la region dans la base de données " );
		}
    return $idregion[0];
}

function supprimerRegion($id){
  //donnée : id de la region à supprimer
	//pré : idregion : entier >0
	//résultat : suppression de la region de la base de données
  global $db;
  try{
    $req=$db->prepare('DELETE FROM region WHERE idregion=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression de la region dans la base de données " );
  }

}

function creerRegion($nom){
	//donnée : nom de la region
	//pré : nom : String & length(nom)>0
	//résultat : ajout de l'admin dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO region(nomregion) VALUES (?)');
		$req->execute(array($nom));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion de la region dans la base de données " );
}

}

function getAllRegion(){
	//résultat : Toutes les regions de la base de donnée
	//post : Listeregion : array : une ligne par region,(idregion, nomregion) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM region');
  		$req->execute(array());
  		$Listeregion=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des regions dans la base de données " );
  }
      return $Listeregion;
  }

  function getAllDepartementRegion($id){
  	//données : id de la région
  	//pré : idregion: entier > 0
  	//résultat : tous les département de la région passée en paramètre
  	//post : Listedepregion : array : une ligne par departement,(nomdep) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomdep FROM region, departement WHERE region.idregion=departement.idregion AND region.idregion=?');
    		$req->execute(array());
    		$Listedepregion=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des departement de la region dans la base de données " );
    }
        return $Listedepregion;
    }

  function modifRegion($id, $newnom){
  	//donnée : id de la region à modifier et le nouveau nom
  	//pré : idregion : entier > 0 / newnom : String & length(newnom)>0
  	//résultat : modifie le nom actuel de la région par le nouveau
    global $db;
    try{
  		$req=$db->prepare('UPDATE region SET nomregion= :newnom WHERE idregion=:id');
  		$req->execute(array(
  			'newnom' => $newnom,
  			'id' => $id
  		));
  	} catch(PDOException $e){
  		echo($e->getMessage());
  		die(" Erreur lors de la modification du nom de region dans la table " );
  }
  }



function existeRegion($nom){
  //données : nom de la region
	//pré : nom: String
	//résultat : id de la region si elle existe, NULL sinon
	//post : idregion : entier >0 ou NULL
  global $db;
	try{
		$req=$db->prepare('SELECT idregion FROM region WHERE nomregion=?');
		$req->execute(array($nom));
		$idregion=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence de la region dans la table " );
}
		return $idregion[0];

}










 ?>
