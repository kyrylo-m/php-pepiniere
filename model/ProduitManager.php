<?php
//session_start();
require_once('model/Manager.php');

class ProduitManager extends Manager 
{
	public function listerProduitsParCat($cat)
	{
		$bdd = $this->connexionBD();
		$reponse = $bdd->prepare('select id, nom, photo from produits where categorie=? order by nom'); 
		$reponse->execute(array($cat));
		return $reponse;	
	}

	function trouverProduitParId($id)
	{
		$bdd = $this->connexionBD();
		$reponse = $bdd->prepare('select * from produits where id=?'); 
		$reponse->execute(array($id));
		return $reponse;	
	}

}