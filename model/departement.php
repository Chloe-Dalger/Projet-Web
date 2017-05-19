<?php




function getNomDepartement($id){
  //donnée: id du departement
	//pré : iddep : entier > 0
	//résultat : le nom correspondant à l'id donné en paramètre
	//post : nomdep : String  ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT nomdep FROM departement WHERE iddep=?');
    $req->execute(array($id));
		$nomdep=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom du departement dans la base de données " );
		}
    return $nomdep[0];
}



function getNumeroDepartement($id){
  //donnée: id du departement
	//pré : iddep : entier > 0
	//résultat : le numero correspondant à l'id donné en paramètre
	//post : numerodep : String de 2 ou 3 chiffres  ou NULL
    global $db;
  try{
    $req=$db->prepare('SELECT numerodep FROM departement WHERE iddep=?');
    $req->execute(array($id));
		$numerodep=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du numero du departement dans la base de données " );
		}
    return $numerodep[0];
}

function getIdRegionDepartement($id){
  //donnée: id du departement
	//pré : iddep : entier > 0
	//résultat : l'idregion correspondant à l'id donné en paramètre
	//post : idregion : entier>0  ou NULL
    global $db;
  try{
    $req=$db->prepare('SELECT idregion FROM departement WHERE iddep=?');
    $req->execute(array($id));
		$idregion=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de la region du departement dans la base de données " );
		}
    return $idregion[0];
}

function getIdDepartement($nom){
  //donnée: nom du departement
	//pré : nom : String & length(nom)>0
	//résultat : l'id correspondant au departement donné en paramètre
	//post : iddep: entier>0 ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT iddep FROM departement WHERE nomdep=?');
    $req->execute(array($nom));
		$iddep=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du departement dans la base de données " );
		}
    return $iddep[0];
}

function getIdNDepartement($num){
  //donnée: nom du departement
	//pré : nom : String & length(nom)>0
	//résultat : l'id correspondant au departement donné en paramètre
	//post : iddep: entier>0 ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT iddep FROM departement WHERE numerodep=?');
    $req->execute(array($num));
		$iddep=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du departement dans la base de données " );
		}
    return $iddep[0];
}

function supprimerDepartement($id){
  //donnée : id du département à supprimer
	//pré : iddep : entier >0
	//résultat : suppression du département de la base de données
  global $db;
  try{
    $req=$db->prepare('DELETE FROM departement WHERE iddep=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du departement dans la base de données " );
  }
}

function creerDepartement($nom,$numero, $idregion){
	//donnée : nom du département, numéro du département, idregion à laquelle le département appartient
	//pré : nom, numero : String & length(nom)>0 length(numero)>0, idregion: entier>0
	//résultat : ajout du département dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO departement(nomdep,numerodep, idregion) VALUES (?,?,?)');
		$req->execute(array($nom, $numero, $idregion));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion du departement dans la base de données " );
}

}

function getAllDepartement(){
	//résultat : tous les départements de la base de données
	//post : Listedep : array : une ligne par departement,(iddep, nomdep, numerodep, idregion) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM departement');
  		$req->execute(array());
  		$Listedep=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des departements dans la base de données " );
  }
      return $Listedep;
  }

  function getAllVilleDepartement($id){
  	//données : id du département
  	//pré : iddep : entier > 0
  	//résultat : tous les noms des villes du département passé en paramètre
  	//post : Listevilledep : array : une ligne par nom de ville,(nomville) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomville FROM ville, departement WHERE departement.iddep=ville.iddep AND departement.iddep=?');
    		$req->execute(array());
    		$Listevilledep=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des departements dans la base de données " );
    }
        return $Listevilledep;
    }

  function getAllNomDepartement(){
  	//résultat : tous les département de la base de donnée
  	//post : Listenomdep : array : une ligne par nom de département,(nomdep) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomdep  FROM departement');
    		$req->execute(array());
    		$Listenomdep=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des noms des departements dans la base de données " );
    }
        return $Listenomdep;
    }

  function modifNumeroDepartement($id,$newnum){
  	//donnée : id du département à modifier et un nouveau numéro
  	//pré : iddep : entier > 0 / newnum : String & length(newnum)>0
  	//résultat : modifie le numéro de département par le nouveau
    global $db;
    try{
  		$req=$db->prepare('UPDATE departement SET numerodep= :newnum WHERE iddep=:id');
  		$req->execute(array(
  			'newnum' => $newnum,
  			'iddep' => $id
  		));
  	} catch(PDOException $e){
  		echo($e->getMessage());
  		die(" Erreur lors de la modification du numero du departement dans la table " );
  }
  }

  function modifNomDepartement($id,$newnom){
	//donnée : id du département à modifier et le nouveau nom
	//pré : iddep : entier > 0 / newnom : String & length(newnom)>0
	//résultat : modifie le nom actuel du départment par le nouveau
  global $db;
	try{
		$req=$db->prepare('UPDATE departement SET nomdep= :newnom WHERE iddep=:id');
		$req->execute(array(
			'newnom' => $newnom,
			'iddep' => $id
		));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du nom du departement dans la table " );
}
}


function existeDepartement($num){
	//données : nom du departement
	//pré : nom: String
	//résultat : id du departement s'il existe, NULL sinon
	//post : iddep: entier >0 ou NULL
  global $db;
	try{
		$req=$db->prepare('SELECT iddep FROM departement WHERE numerodep=?');
		$req->execute(array($num));
		$iddep=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence du departement dans la table " );
}
		return $iddep[0];

}
 ?>
