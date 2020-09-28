<?php

function connexionBD()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_pepiniere;charset=utf8;port=3304', 'root', '');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function trouverUtilisateur($utilisateur)
{
	$bdd = connexionBD();
	$reponse = $bdd->prepare('select utilisateur, mdp from clients where utilisateur=?'); 
	$reponse->execute(array($utilisateur));
	return $reponse;
}

function ajouterUtilisateur($utilisateur, $mdp, $prenom, $nom, $courriel, $adresse)
{
	$bdd = connexionBD();
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

function compter()
{
	$monfichier = fopen('files/compteur.txt', 'r+');
	 
	$pages_vues = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
	$pages_vues += 1; // On augmente de 1 ce nombre de pages vues
	fseek($monfichier, 0); // On remet le curseur au début du fichier
	fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
	 
	fclose($monfichier);
	return $pages_vues;
}

function listerProduitsParCat($cat)
{
	$bdd = connexionBD();
	$reponse = $bdd->prepare('select id, nom, description, prix, quantite from produits where categorie=?'); 
	$reponse->execute(array($cat));
	return $reponse;	
}

function afficherProduits($produits)
{
	while($produit = $produits->fetch())
			{
	?>			
				<tr>
					<td><a href="page_produit?id=<?= $produit['id'] ?>"> <?= $produit['nom'] ?> </a></td>
					<td> <?= $produit['description'] ?> </td>
					<td> <?= $produit['prix'] ?> </td>
					<td> <?= $produit['quantite'] ?> </td>
				</tr>
	<?php
			}	
}	

function trouverProduitParId($id)
{
	$bdd = connexionBD();
	$reponse = $bdd->prepare('select id, nom, description, categorie, prix, quantite from produits where id=?'); 
	$reponse->execute(array($id));
	return $reponse;	
}