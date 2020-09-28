<?php
session_start();
require('controller/controller.php');

if (isset($_GET['action'])){
	if ($_GET['action'] == 'contact'){
		contact();
	}
	else if ($_GET['action'] == 'apropos'){
		apropos();
	}
	else if ($_GET['action'] == 'envoiContact'){
		if (isset($_POST['nom']) && isset($_POST['courriel']) && isset($_POST['message'])) {
			envoiContact($_POST['nom'], $_POST['courriel'], $_POST['message']);
		}
		else {
			echo "Erreur : tous les champs ne sont pas remplis!";
		}
	}
	else if ($_GET['action'] == 'connexion'){
		connexion();
	}
	else if ($_GET['action'] == 'deconnexion'){
		deconnexion();
	}
	else if ($_GET['action'] == 'login'){
		if (isset($_POST['utilisateur']) && isset($_POST['mdp'])){
			login(strtoupper($_POST['utilisateur']), $_POST['mdp']);
		}
		else {
			echo "Erreur : Entrez le nom d'utilisateur et le mot de passe.";
		}
	}
	else if ($_GET['action'] == 'nouveauCompte'){
		nouveauCompte();
	}
	else if ($_GET['action'] == 'verifierPseudo'){
		if (isset(($_POST['pseudo']))){
			verifierPseudo(strtoupper($_POST['pseudo']));
		}
	}
	else if ($_GET['action'] == 'creerCompte'){
		if (isset($_POST['utilisateur']) && isset($_POST['mdp']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['courriel']) && isset($_POST['adresse'])){
				creerCompte(strtoupper($_POST['utilisateur']), $_POST['mdp'], $_POST['prenom'], $_POST['nom'], $_POST['courriel'], $_POST['adresse']);
		}
		else {
			echo "Erreur : Remplissez tous le champs.";
		}		
	}
	else  if ($_GET['action'] == 'produits'){
		if (isset ($_SESSION['utilisateur'])){
			categories();
		}
		else {
			connexion();
			echo "Connectez-vous pour voir nos produits";
		} 
	}
	else  if ($_GET['action'] == 'afficherCat'){
		if (isset ($_SESSION['utilisateur'])){
			if (isset($_GET['cat'])){
				listerProduits($_GET['cat']);
			}
			else {
				echo "La categorie de produit n'est pas choisie.";
			}
		}
		else {
			connexion();
			echo "Connectez-vous pour voir nos produits";
		} 
	}
	else if ($_GET['action'] == 'afficherProd'){
		if (isset ($_GET['id'])){
			afficherProduit($_GET['id']);
		}
		else {
			echo "ID de produit n'est pas choisie";
		}
	}
	else if ($_GET['action'] == 'afficherLivre'){
		if (isset ($_SESSION['utilisateur'])){
			afficherLivre();		
		}
		else {
			connexion();
			echo "Connectez-vous pour voir le Livre d'or";
		}	
	}
	else if ($_GET['action'] == 'envoiCommentaire'){
		if (isset($_SESSION['utilisateur'])){
			if (isset($_POST['commentaire'])){
				envoyerCommentaire($_SESSION['utilisateur'], $_POST['commentaire']);
			}
			else {
				echo "Le commentaire est vide";
			}		
		}
		else{
			connexion();
			echo "Connectez-vous pour écrire à notre Livre d'or";
		}	
	}
	else if($_GET['action'] == 'afficherCommentaire'){
		if (isset($_SESSION['utilisateur'])){
			if (isset($_GET['id'])){
				afficherCommentaire($_GET['id']);
			}
			else {
				echo "Le numéro de commentaire n'est pas choisi";
			}
		}
		else {
			connexion();
			echo "Connectez-vous pour écrire à notre Livre d'or";
		}
	}
	else if ($_GET['action'] == 'modifierCommentaire'){
		if (isset($_SESSION['utilisateur'])){
			if (isset($_GET['id'])){
				if (isset($_POST['commentaire'])){
					modifierCommentaire($_GET['id'], $_POST['commentaire']);
				}
				else {
					echo "Le commentaire est vide";
				}
			}
			else {
				echo "Le numéro de commentaire n'est pas choisi";
			}
		}
		else {
			connexion();
			echo "Connectez-vous pour écrire à notre Livre d'or";
		}
	}
	else if ($_GET['action'] == 'voter'){
		if (isset($_SESSION['utilisateur'])){
			if (isset($_GET['id'])){ // ajouter ici le cotrole si l'utilisateur a deja voté
				if(isset($_GET['vote'])){
					voter($_GET['id'], $_GET['vote']);
				}
				else {
					echo "La valeur de vote n'est pas choisi";
				}
			}
			else {
				echo "Le numéro de commentaire n'est pas choisi";
			}				
		}
		else {
			connexion();
			echo "Connectez-vous pour écrire à notre Livre d'or";
		}		
	}
	else {
		accueil();
	}	
}
else {
	accueil();
}