<?php
//session_start();
require_once('model/Manager.php');

class ConnexionManager extends Manager 
{
	public function trouverUtilisateur($utilisateur)
	{
		$bdd = $this->connexionBD();
		$reponse = $bdd->prepare('select utilisateur from clients where utilisateur=?'); 
		$reponse->execute(array($utilisateur));
		return $reponse;
	}
	
	public function connecterUtilisateur($utilisateur, $mdp) 
	{
		$bdd = $this->connexionBD();		
		$reponse = $bdd->prepare('select utilisateur, mdp from clients where utilisateur=?'); 
		
		$reponse->execute(array($utilisateur));
		if ($donnees = $reponse->fetch())
		{	
			if ($donnees['mdp'] == $mdp)
			{
				// Mot de pass est correct
				$reponse->closeCursor();	
				return 0;				
			}
			else {
				// mot de passe n'est pas bon
				$reponse->closeCursor();	
				return 1;				
			}	
		}	
		else {
			// Utilisateur non-existant
			$reponse->closeCursor();	
			return -1;			
		}
	}	


	public function ajouterUtilisateur($utilisateur, $mdp, $prenom, $nom, $courriel, $adresse)
	{
		$bdd = $this->connexionBD();
		$req = $bdd->prepare('insert into clients values (:utilisateur, :mdp, :prenom, :nom, :courriel, :adresse)');
		$modificationFaite = $req->execute(array(
			'utilisateur' => $utilisateur,
			'mdp' => $mdp,
			'prenom' => $prenom,
			'nom' => $nom,
			'courriel' => $courriel,
			'adresse' => $adresse
		));
		return $modificationFaite;
	}
}

