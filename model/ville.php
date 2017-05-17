<?php




function getNomVille($id){

  global $db;
  try{
    $req=$db->prepare('SELECT nomville FROM ville WHERE idville=?');
    $req->execute(array($id));
		$nomville=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom de la ville dans la base de données " );
		}
    return $nomville[0];
}



function getCodePostalVille($id){

    global $db;
  try{
    $req=$db->prepare('SELECT cpville FROM ville WHERE idville=?');
    $req->execute(array($id));
		$cpville=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du code postal de la ville dans la base de données " );
		}
    return $cpville[0];
}

function getIdDepartementVille($id){

    global $db;
  try{
    $req=$db->prepare('SELECT iddep FROM ville WHERE idville=?');
    $req->execute(array($id));
		$iddep=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du departement de la ville dans la base de données " );
		}
    return $iddep[0];
}

function getIdVille($nom){

  global $db;
  try{
    $req=$db->prepare('SELECT idville FROM ville WHERE nomville=?');
    $req->execute(array($nom));
		$idville=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id de la ville dans la base de données " );
		}
    return $idville[0];
}

function supprimerVille($id){

  global $db;
  try{
    $req=$db->prepare('DELETE FROM ville WHERE idville=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression de la ville dans la base de données " );
  }
}

function creerVille($nom,$cp, $iddep){
	//donnée : nom de compte, mot de passe crypté, nom et prénom de l'admin
	//pré : nomdeCompte,mdp,nom,prenom : String
	//résultat : ajout de l'admin dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO ville(nomville,cpville, iddep) VALUES (?,?,?)');
		$req->execute(array($nom, $cp, $iddep));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion de la ville dans la base de données " );
}

}

function getAllville(){
	//données : id de l'admin
	//pré : idAdmin : entier > 0
	//résultat : tous les admins autres que celui passé en paramètre
	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM ville');
  		$req->execute(array());
  		$Listeville=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des villes dans la base de données " );
  }
      return $Listeville;
  }

  function getAllNomVille(){
  	//données : id de l'admin
  	//pré : idAdmin : entier > 0
  	//résultat : tous les admins autres que celui passé en paramètre
  	//post : admins : array : une ligne par admin,(id,prenom,nom,email) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomville FROM ville');
    		$req->execute(array());
    		$Listenomville=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des noms des villes dans la base de données " );
    }
        return $Listenomville;
    }

  function modifCodePostalVille($id,$newnum){
  	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
  	//pré : idAdmin : entier > 0 / newMdp : String
  	//résultat : modifie le mot de passe actuel avec le nouveau mdp
    global $db;
    try{
  		$req=$db->prepare('UPDATE ville SET cpville= :newnum WHERE idville=:id');
  		$req->execute(array(
  			'newnum' => $newnum,
  			'idville' => $id
  		));
  	} catch(PDOException $e){
  		echo($e->getMessage());
  		die(" Erreur lors de la modification du code postal de la ville dans la table " );
  }
  }

  function modifNomVille($id,$newnom){
	//donnée : id de l'admin qui veut modifier son mdp et nouveau mdp
	//pré : idAdmin : entier > 0 / newMdp : String
	//résultat : modifie le mot de passe actuel avec le nouveau mdp
  global $db;
	try{
		$req=$db->prepare('UPDATE ville SET nomville= :newnom WHERE idville=:id');
		$req->execute(array(
			'newnom' => $newnom,
			'idville' => $id
		));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du nom de la ville dans la table " );
}
}


function existeVille($nom){
	//données : email et mot de passe crypté de l'admin
	//pré : email : String / password : String
	//résultat : id de l'admin s'il existe, NULL sinon
	//post : id : entier >0
  global $db;
	try{
		$req=$db->prepare('SELECT idville FROM ville WHERE nomville=?');
		$req->execute(array($nom));
		$idville=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence de la ville dans la table " );
}
		return $idville[0];

}
 ?>
