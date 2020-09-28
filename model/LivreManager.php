<?php
require_once('model/Manager.php');

class LivreManager extends Manager 
{
	public function listerBillets () {
		$bdd = $this->connexionBD();
		$requete = $bdd->query('select id, date, auteur, commentaire, classement from livredor order by id desc limit 0, 10');
		return $requete;
	}	
	
	public function envoyerCommentaire($auteur, $commentaire) {
		$bdd = $this->connexionBD();
		$requete = $bdd->prepare('INSERT INTO livredor(date, auteur, commentaire) VALUES(NOW(), ?, ?)');
		$modificationFaite = $requete->execute(array($auteur, $commentaire));
		return $modificationFaite;
	}
	
	public function afficherCommentaire($id) {
		$bdd = $this->connexionBD();
		$requete = $bdd->prepare('select id, date, auteur, commentaire from livredor where id=?');
		$requete->execute(array($id));		
		return $requete;
	}
	
	public function modifierCommentaire($id, $text){
		$bdd = $this->connexionBD();
		$requete = $bdd->prepare('UPDATE livredor SET commentaire = ?, date = NOW() WHERE id = ?');
		$modificationFaite = $requete->execute(array($text, $id));
		return $modificationFaite;
	}
	
	public function voterPourCommentaire($id, $valeur){
		$classement;
		$bdd = $this->connexionBD();
		$requete = $bdd->prepare('select classement from livredor where id = ?');
		$requete->execute(array($id));	
		
		if ($donnees = $requete->fetch()){
			$classement = $donnees['classement'];
			if ($valeur == 'plus'){
				$classement++;
			}
			else {
				if ($classement > 0){
					$classement--;
				}
			}
			$requete->closeCursor();
			
			$requete = $bdd->prepare('UPDATE livredor SET classement = ? WHERE id = ?');
			$modificationFaite = $requete->execute(array($classement, $id));
			return $modificationFaite;
		}
	}
}