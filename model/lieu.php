<?php




function getNomLieu($id){
  //donnée: id du lieu
	//pré : idlieu : entier > 0
	//résultat : le nom du lieu correspondant à l'id donné en paramètre
	//post : nomlieu : String  ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT nomlieu FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$nomlieu=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération du nom du lieu dans la base de données " );
		}
    return $nomlieu[0];
}




function getUrlLieu($id){
  //donnée: id du lieu
	//pré : idlieu : entier > 0
	//résultat : l'url de l'image correspondant à l'id donné en paramètre
	//post : urllieu : String  ou NULL
    global $db;
  try{
    $req=$db->prepare('SELECT urllieu FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$urllieu=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'url de l'image du lieu dans la base de données " );
		}
    return $urllieu[0];
}

function getDescriptionLieu($id){
  //donnée: id du lieu
	//pré : idlieu : entier > 0
	//résultat : la description correspondant à l'id donné en paramètre
	//post : deslieu : String  ou NULL
    global $db;
  try{
    $req=$db->prepare('SELECT deslieu FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$deslieu=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de la description du lieu dans la base de données " );
		}
    return $deslieu[0];
}

function getAdresseLieu($id){
  //donnée: id du lieu
	//pré : idlieu : entier > 0
	//résultat : l'adresse correspondant à l'id donné en paramètre
	//post : deslieu : String  ou NULL
    global $db;
  try{
    $req=$db->prepare('SELECT adrlieu FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$adrlieu=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'adresse du lieu dans la base de données " );
		}
    return $adrlieu[0];
}

function getIdPseudoLieu($id){
  //donnée: id du lieu
	//pré : idlieu : entier > 0
	//résultat : l'idpseudo correspondant à l'id donné en paramètre
	//post : idpseudo : entier>0  ou NULL
    global $db;
  try{
    $req=$db->prepare('SELECT idpseudo FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$idpseudo=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du pseudo du lieu dans la base de données " );
		}
    return $idpseudo[0];
}

function getIdVilleLieu($id){
  //donnée: id du lieu
	//pré : idlieu : entier > 0
	//résultat : l'idville correspondant à l'id donné en paramètre
	//post : idville : entier>0 ou NULL
    global $db;
  try{
    $req=$db->prepare('SELECT idville FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$idville=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id de la ville du lieu dans la base de données " );
		}
    return $idville[0];
}

function getIdCategorieLieu($id){
  //donnée: id du lieu
	//pré : idlieu : entier > 0
	//résultat : l'idcat correspondant à l'id donné en paramètre
	//post : idcat : entier>0 OU NULL
    global $db;
  try{
    $req=$db->prepare('SELECT idcat FROM lieu WHERE idlieu=?');
    $req->execute(array($id));
		$idcat=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id de la categorie du lieu dans la base de données " );
		}
    return $idcat[0];
}

function getIdLieu($nom){
  //donnée: un nom de lieu
	//pré : nom : String & length(nom)>0
	//résultat : l'id correspondant au lieu donné en paramètre
	//post : idlieu: entier>0 ou NULL
  global $db;
  try{
    $req=$db->prepare('SELECT idlieu FROM lieu WHERE nomlieu=?');
    $req->execute(array($nom));
		$idlieu=$req->fetch();
  } catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la récupération de l'id du lieu dans la base de données " );
		}
    return $idlieu[0];
}

function supprimerLieu($id){
  //donnée : id du lieu à supprimer
	//pré : idlieu : entier >0
	//résultat : suppression du lieu de la base de données
  global $db;
  try{
    $req=$db->prepare('DELETE FROM lieu WHERE idlieu=?');
		$req->execute(array($id));
	} catch(PDOException $e){
			echo($e->getMessage());
			die(" Erreur lors de la suppression du lieu dans la base de données " );
  }
}

function creerLieu($nom, $url, $des, $adr, $idpseudo, $idville, $idcat){
	//donnée : nom du lieu, l'url de l'image correspondant au lieu, description du lieu, adresse du lieu, pseudo de celui qui a ajouté de lieu, id de la ville dans laquelle se trouve le lieu et id de la catégorie à laquelle appartient le lieu
	//pré : nom : String & length(nom)>0, url, adr, des: String ou NULL, idpseudo, idville, idcat: Entier>0
	//résultat : ajout du lieu dans la base de données

  global $db;
	try{
		$req=$db->prepare('INSERT INTO lieu(nomlieu, urllieu, deslieu, adrlieu, idpseudo, idville, idcat) VALUES (?,?,?,?,?,?,?)');
		$req->execute(array($nom, $url, $des, $adr, $idpseudo, $idville, $idcat));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors l'insertion du lieu dans la base de données " );
}

}

function getAllLieu(){
	//résultat : tous les lieux de la base de données
	//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT * FROM lieu');
  		$req->execute(array());
  		$Listelieu=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des lieuxx dans la base de données " );
  }
      return $Listelieu;
  }

  function getAllNomLieu(){
  	//résultat : tous les noms de lieux de la base de données
  	//post : Listenomlieu : array : une ligne par nom de lieu,(nomlieu) pour les colonnes

    global $db;
    try{
    		$req=$db->prepare('SELECT nomlieu FROM lieu');
    		$req->execute(array());
    		$Listenomlieu=$req->fetchAll();
    	} catch(PDOException $e){
    			echo($e->getMessage());
    			die(" Erreur lors de la récupération des noms des lieux dans la base de données " );
    }
        return $Listenomlieu;
    }

    function getAllMotCleLieu($id){
    	//données : id du lieu
    	//pré : idlieu : entier > 0
    	//résultat : tous les mots clés du lieu passé en paramètre
    	//post : Listemotclelieu : array : une ligne par mot cle,(libmotcle) pour les colonnes

      global $db;
      try{
      		$req=$db->prepare('SELECT libmotcle FROM possede_mc, mot_cle, lieu WHERE lieu.idlieu=possede_mc.idlieu AND mot_cle.idmotcle=possede_mc.idmotcle AND idlieu=?');
      		$req->execute(array());
      		$Listemotclelieu=$req->fetchAll();
      	} catch(PDOException $e){
      			echo($e->getMessage());
      			die(" Erreur lors de la récupération de tous les mot cle du lieu dans la base de données " );
      }
          return $Listemotclelieu;
      }


  function modifNomLieu($newnom, $id){
	//donnée : id du lieu à modifier et un nouveau nom
	//pré : idlieu : entier > 0 / newnom : String & length(newnom)>0
	//résultat : modifie le nom actuel du lieu par le nouveau
  global $db;
	try{
		$req=$db->prepare('UPDATE lieu SET nomlieu= ? WHERE idlieu=?');
		$req->execute(array(
			'newnom' => $newnom,
			'idlieu' => $id
		));
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la modification du nom du lieu dans la table " );
}
}

function modifUrlLieu($newurl, $id){
  //donnée : id du lieu à modifier
  //pré : idlieu : entier > 0 / newurl : String & length(newurl)>=0
  //résultat : modifie l'url de l'image du lieu par une nouvelle url
  global $db;
  try{
    $req=$db->prepare('UPDATE lieu SET urllieu= ? WHERE idlieu=?');
    $req->execute(array(
      'newurl' => $newurl,
      'idlieu' => $id
    ));
  } catch(PDOException $e){
    echo($e->getMessage());
    die(" Erreur lors de la modification de l'url du lieu dans la table " );
}
}

function modifDescriptionLieu($newdes, $id){
  //donnée : id du lieu à modifier et une nouvelle description
  //pré : idlieu : entier > 0 / newdes : String & length(newdes)>=0
  //résultat : modifie la description du lieu actuelle par la nouvelle
  global $db;
  try{
    $req=$db->prepare('UPDATE lieu SET deslieu= ? WHERE idlieu=?');
    $req->execute(array(
      'newdes' => $newdes,
      'idlieu' => $id
    ));
  } catch(PDOException $e){
    echo($e->getMessage());
    die(" Erreur lors de la modification de la description du lieu dans la table " );
}
}

function modifAdresseLieu($newadr, $id){
  //donnée : is du lieu à modifier et la nouvelle adresse du lieu
  //pré : idlieu : entier > 0 / newadr : String & length(newadr)>=0
  //résultat : modifie l'adresse du lieu par la nouvelle
  global $db;
  try{
    $req=$db->prepare('UPDATE lieu SET adrlieu= ? WHERE idlieu=?');
    $req->execute(array(
      'newadr' => $newadr,
      'idlieu' => $id
    ));
  } catch(PDOException $e){
    echo($e->getMessage());
    die(" Erreur lors de la modification de l'adresse du lieu dans la table " );
}
}


function existeLieu($nom, $ville){
  //données : nom du lieu
	//pré : nom: String
	//résultat : id du lieu s'il existe, NULL sinon
	//post : idlieu : entier >0 ou NULL
  global $db;
	try{
		$req=$db->prepare('SELECT idlieu FROM lieu WHERE LOWER(nomlieu)=LOWER(?) AND idville=(SELECT idville FROM ville WHERE LOWER(nomville)=LOWER(?))');
		$req->execute(array($nom, $ville));
		$idlieu=$req->fetch();
	} catch(PDOException $e){
		echo($e->getMessage());
		die(" Erreur lors de la vérification de l'existence du lieu dans la table " );
}
		return $idlieu[0];

}

function getAllVilleDepartementRegionLieu($idville, $iddepartement, $idregion){
	//résultat : tous les lieux de la base de données
	//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

  global $db;
  try{
  		$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu, ville, departement, region WHERE lieu.idville=? AND lieu.idville=ville.idville AND ville.iddep=? AND ville.iddep=departement.iddep AND departement.idregion=?');
  		$req->execute(array());
  		$Listelieu=$req->fetchAll();
  	} catch(PDOException $e){
  			echo($e->getMessage());
  			die(" Erreur lors de la récupération des lieux dans la base de données " );
  }
      return $Listelieu;
  }

	function getAllDepartementRegionLieu($iddepartement, $idregion){
		//résultat : tous les lieux de la base de données
		//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

	  global $db;
	  try{
	  		$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu WHERE lieu.idville=(SELECT idville from ville, departement where ville.iddep=? AND ville.iddep=departement.iddep AND departement.idregion=?');
	  		$req->execute(array());
	  		$Listelieu=$req->fetchAll();
	  	} catch(PDOException $e){
	  			echo($e->getMessage());
	  			die(" Erreur lors de la récupération des lieux dans la base de données " );
	  }
	      return $Listelieu;
	  }


			function getAllVilleLieu($idville){
				//résultat : tous les lieux de la base de données
				//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

				global $db;
				try{
						$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu, ville WHERE lieu.idville=? ');
						$req->execute(array());
						$Listelieu=$req->fetchAll();
					} catch(PDOException $e){
							echo($e->getMessage());
							die(" Erreur lors de la récupération des lieux dans la base de données " );
				}
						return $Listelieu;
				}


				function getAllDepartementLieu($iddepartement){
					//résultat : tous les lieux de la base de données
					//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

					global $db;
					try{
							$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu WHERE lieu.idville=(SELECT ville.idville FROM ville WHERE ville.iddep= ?) ');
							$req->execute(array());
							$Listelieu=$req->fetchAll();
						} catch(PDOException $e){
								echo($e->getMessage());
								die(" Erreur lors de la récupération des lieux dans la base de données " );
					}
							return $Listelieu;
					}

					function getAllRegionLieu($idregion){
						//résultat : tous les lieux de la base de données
						//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

						global $db;
						try{
								$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu WHERE lieu.idville IN (SELECT ville.idville FROM ville WHERE ville.iddep IN (SELECT departement.iddep FROM departement WHERE departement.idregion=?))');
								$req->execute(array());
								$Listelieu=$req->fetchAll();
							} catch(PDOException $e){
									echo($e->getMessage());
									die(" Erreur lors de la récupération des lieuxs dans la base de données " );
						}
								return $Listelieu;
							}

							function getAllVilleDepartementLieu($idville, $iddepartement){
								//résultat : tous les lieux de la base de données
								//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

							  global $db;
							  try{
							  		$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu, ville WHERE lieu.idville=? AND lieu.idville=ville.idville AND ville.iddep=?');
							  		$req->execute(array());
							  		$Listelieu=$req->fetchAll();
							  	} catch(PDOException $e){
							  			echo($e->getMessage());
							  			die(" Erreur lors de la récupération des lieux dans la base de données " );
							  }
							      return $Listelieu;
							  }

								function getAllVilleRegionLieu($idville, $idregion){
									//résultat : tous les lieux de la base de données
									//post : Listelieu : array : une ligne par lieu,(idlieu, nomlieu, urllieu, deslieu, idpseudo, idville, idcat) pour les colonnes

									global $db;
									try{
											$req=$db->prepare('SELECT (nomlieu, urllieu, deslieu, adrlieu) FROM lieu, ville, departement, region WHERE lieu.idville=? AND lieu.idville=ville.idville AND ville.iddep=(SELECT departement.iddep FROM departement WHERE departement.idregion=?)');
											$req->execute(array());
											$Listelieu=$req->fetchAll();
										} catch(PDOException $e){
												echo($e->getMessage());
												die(" Erreur lors de la récupération des lieux dans la base de données " );
									}
											return $Listelieu;
									}

 ?>
