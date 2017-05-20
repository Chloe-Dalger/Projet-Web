<?php




function getNomVille($id){
  //donnée: id de la ville
	//pré : idville : entier > 0
	//résultat : le nom correspondant à l'id donné en paramètre
	//post : nomville : String  ou NULL
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
  //donnée: id de la ville
	//pré : idville : entier > 0
	//résultat : le nom correspondant à l'id donné en paramètre
	//post : cpville : String de 5 chiffres ou NULL
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
  //donnée: id de la ville
	//pré : idville : entier > 0
	//résultat : l'iddep correspondant à l'id donné en paramètre
	//post : iddep : entier>0 OU NULL
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
  //donnée: nom de la ville
	//pré : nom : String & length(nom)>0
	//résultat : l'id correspondant à la ville donnée en paramètre
	//post : idville: entier>0 ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT idville FROM ville WHERE LOWER(nomville)=LOWER(?)');
    $req->execute(array($nom));
		$idville=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id de la ville dans la base de données " );
		}
    return $idville[0];
}

function supprimerVille($id){
  //donnée : id de la ville à supprimer
	//pré : idville : entier >0
	//résultat : suppression de la ville de la base de données
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
	//donnée : nom de la ville, code postal de la ville et id du département duquel la ville dépend
	//pré : nom, cp : String & length(nom)>0 length(numero)>0, iddep: Entier>0
	//résultat : ajout de le ville dans la base de données

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
	//résultat : Toutes les villes de la base de données
	//post : Listeville : array : une ligne par ville,(idville, nomville, cpville, iddep) pour les colonnes

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
    //résultat : tous les noms de ville de la base de données
  	//post : Listenomville : array : une ligne par nom de ville,(nomville) pour les colonnes

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

    function getAllLieuVille($id){
      //données : id de la ville
      //pré : idville : entier > 0
      //résultat : tous les lieux de la ville passée en paramètre
      //post : Listelieuville : array : une ligne par lieu,(nomlieu, urllieu, deslieu, adrlieu) pour les colonnes

      global $db;
      try{
          $req=$db->prepare('SELECT nomlieu, urllieu, deslieu, adrlieu FROM ville, lieu WHERE ville.idville=lieu.idville AND lieu.idville=?');
          $req->execute(array());
          $Listelieuville=$req->fetchAll();
        } catch(PDOException $e){
            echo($e->getMessage());
            die(" Erreur lors de la récupération des noms des villes dans la base de données " );
      }
          return $Listelieuville;
      }

  function modifCodePostalVille($id,$newnum){
  	//donnée : id de la ville à modifier et le nouveau code postal
  	//pré : idville : entier > 0 / newnum : String & length(newnum)>0
  	//résultat : modifie le code postal de la ville par le nouveau
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
	//donnée : id de la ville à modifier et le nouveau nom
	//pré : idville : entier > 0 / newnom : String & length(newnom)>0
	//résultat : modifie le nom de la ville par le nouveau
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


function existeVille($num){
  //données : nom de la ville
	//pré : nom: String
	//résultat : id de la ville si elle existe, NULL sinon
	//post : idville : entier >0 ou NULL
  global $db;
	try{
		$req=$db->prepare('SELECT idville FROM ville WHERE cpville=?');
		$req->execute(array($num));
		$idville=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence de la ville dans la table " );
}
		return $idville[0];

}
 ?>
