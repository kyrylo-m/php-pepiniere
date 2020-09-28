<?php
//session_start();
require_once('model/ContactManager.php');
require_once('model/ConnexionManager.php');
require_once('model/ProduitManager.php');
require_once('model/LivreManager.php');

function accueil(){
	require ('view/accueilView.php');
}

function apropos(){
	require ('view/aproposView.php');
}

function contact() {
	require ('view/contactView.php');
}

function envoiContact($nom, $courriel, $message){
	//Contacter le modèle pour ajouter le message à la base de données
	$contactManager = new ContactManager();
	$affectedLines = $contactManager->postMessageContact($nom, $courriel, $message);
	
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'envoyer le message !');
    }
    else {
		require('view/merciContactView.php');
    }	
}

function connexion(){
	require ('view/loginView.php');
}

function login($utilisateur, $mdp){
	$justConnected = false;
	$connexionManager = new ConnexionManager();
	$resultat = $connexionManager->connecterUtilisateur($utilisateur, $mdp);
	if ($resultat == 0){
		$_SESSION['utilisateur'] = $utilisateur;
		$_SESSION['estConnecte'] = true;
		$justConnected = true;
		require ('view/accueilView.php');
	}
	else {
		require ('view/loginView.php');		
	}			
}

function deconnexion (){
	if (isset($_SESSION['utilisateur']) && isset($_SESSION['estConnecte'])){
		$_SESSION['estConnecte'] = false;
		$_SESSION['utilisateur'] = null;
	}	
	require ('view/accueilView.php');
}

function nouveauCompte() {
	require ('view/creerCompteView.php');
}

function verifierPseudo($pseudo){
	$pseudoOk = false;
	$connexionManager = new ConnexionManager();
	$resultat = $connexionManager->trouverUtilisateur($pseudo);
	require ('view/creerCompteView.php');	
}

function creerCompte($utilisateur, $mdp, $prenom, $nom, $courriel, $adresse) {
	$justConnected = false;
	$connexionManager = new ConnexionManager();
	$compteCree = $connexionManager->ajouterUtilisateur($utilisateur, $mdp, $prenom, $nom, $courriel, $adresse);
	
	if ($compteCree)
	{
		$_SESSION['utilisateur'] = $utilisateur;
		$_SESSION['estConnecte'] = true;
		$justConnected = true;
		require ('view/accueilView.php');		
	}
	else 
	{
		echo "Erreur: impossible d'ajouter l'utilisateur";
	}
}

function listerProduits($cat) {
	if ($cat == 1){
		$nomCat = "Arbres fruitiers";
	}
	else if ($cat == 2){
		$nomCat = "Arbres à noix";
	}
	else if ($cat == 3){
		$nomCat = "Arbustes fruitiers";
	}
	else {
		$nomCat = "";
	}
		
	$produitManager = new ProduitManager();
	$produits = $produitManager->listerProduitsParCat($cat);
	require ('view/listeProduitsView.php');
}

function categories(){
	require ('view/categoriesView.php');
}

function afficherProduit($id){
	$produitManager = new ProduitManager();
	$produit = $produitManager->trouverProduitParId($id);
	require ('view/produitView.php');
}

function afficherLivre (){
	$livreManager = new LivreManager();
	$reponse = $livreManager->listerBillets();
	require ('view/livredorView.php');	
}

function envoyerCommentaire($auteur, $commentaire){
	$livreManager = new LivreManager();
	$modification = $livreManager->envoyerCommentaire($auteur, $commentaire);
	if ($modification){
		afficherLivre();
	}
	else {
		echo "Impossible d'ajouter un commentaire";
		require ('view/livredorView.php');
	}
}

function afficherCommentaire($id){
	$livreManager = new LivreManager();
	$reponse = $livreManager->afficherCommentaire($id);
	require ('view/modificationView.php');
}

function modifierCommentaire($id, $text){
	$livreManager = new LivreManager();
	$modification = $livreManager->modifierCommentaire($id, $text);
	if ($modification){
		afficherLivre();
	}
	else {
		echo "Impossible de modifier le commentaire";
		require ('view/livredorView.php');
	}	
}

function voter($commentaireId, $valeur){
	$livreManager = new LivreManager();
	$modification = $livreManager->voterPourCommentaire($commentaireId, $valeur);
	if ($modification){
		afficherLivre();
	}
	else {
		echo "Impossible de voter pour le commentaire";
		require ('view/livredorView.php');
	}
}