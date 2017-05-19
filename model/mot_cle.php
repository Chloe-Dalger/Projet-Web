<?php




function getLibelleMotCle($id){
  //donnée: id du mot cle
	//pré : idmotcle : entier > 0
	//résultat : le libellé correspondant à l'id donné en paramètre
	//post : libmotcle : String  ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT libmotcle FROM mot_cle WHERE idmotcle=?');
    $req->execute(array($id));
		$libmotcle=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du mot cle dans la base de données " );
		}
    return $libmotcle[0];
}


function getIdMotCle($nom){
  //donnée: nom, un mot cle
	//pré : nom : String & length(nom)>0
	//résultat : l'id correspondant au mot cle donné en paramètre
	//post : idmotcle: entier>0 ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT idmotcle FROM mot_cle WHERE libmotcle=?');
    $req->execute(array($nom));
		$idmotcle=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du mot cle dans la base de données " );
		}
    return $idmotcle[0];
}

function creerMotCle($lib){
	//donnée : libellé du mot clé
	//pré : lib : String & length(lib)>0
	//résultat : ajout du mot cle dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO mot_cle(libmotcle) VALUES (?)');
		$req->execute(array($lib);
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion du mot cle dans la base de données " );
}

}

function getAllMotCle(){
  //résultat : tous les mots clés de la base de données
	//post : Listemotcle : array : une ligne par mot cle,(idmotcle, libmotcle) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM mot_cle');
  		$req->execute(array());
  		$Listemotcle=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des mots cles dans la base de données " );
  }
      return $Listemotcle;
  }

  function getAllLieuMotCle($lib){
  	//données : libellé du mot cle
  	//pré : lib : String & length(lib)>0
    //résultat : tous les lieux du mot clé passé en paramètre
  	//post : Listelieumotcle : array : une ligne par lieu,(nomlieu, urllieu, deslieu, adrlieu) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomlieu, urllieu, deslieu, adrlieu FROM possede_mc, mot_cle, lieu WHERE lieu.idlieu=possede_mc.idlieu AND mot_cle.idmotcle=possede_mc.idmotcle AND libmotcle=?');
    		$req->execute(array());
    		$Listelieumotcle=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des lieux du mot cle dans la base de données " );
    }
        return $Listelieumotcle;
    }




  function modifLibMotCle($newlib, $id){
	//donnée : id du mot clé à modifier et le nouveau libellé
	//pré : idmotcle : entier > 0 / newlib: String & length(newlib)>0
	//résultat : modifie le libellé actuel du mot clé par le nouveau
  global $db;
	try{
		$req=$db->prepare('UPDATE mot_cle SET libmotcle= ? WHERE idmotcle=?');
		$req->execute(array(
			'newlib' => $newlib,
			'idmotcle' => $id
		));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du mot cle dans la table " );
}
}


function existeMotCle($lib){
  //données : mot cle
	//pré : lib: String
	//résultat : id du mot cle s'il existe, NULL sinon
	//post : idmotcle : entier >0 ou NULL
  global $db;
	try{
		$req=$db->prepare('SELECT idmotcle FROM mot_cle WHERE LOWER(libmotcle)=LOWER(?)');
		$req->execute(array($nom));
		$idmotcle=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence du mot cle dans la table " );
}
		return $idmotcle[0];

}
 ?>
