<?php
require_once('model/Manager.php');

class ContactManager extends Manager 
{
	public function postMessageContact ($nom, $courriel, $message) {
		$bdd = $this->connexionBD();
		$requete = $bdd->prepare('insert into messages (nom, courriel, message) values (?, ?, ?)');
		$modificationFaite = $requete->execute(array($nom, $courriel, $message));
		
		return $modificationFaite;
	}
	
}