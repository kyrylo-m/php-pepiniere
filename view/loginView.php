<?php $titre = 'Connexion'; ?>

<?php ob_start(); ?>

<h2 class="nomPage"> Connexion </h2>
<div class="formulaire">	
	<form action="index.php?action=login" method="post">
		<label for="utilisateur">Nom d'utilisateur: </label>
		<input type="text" name="utilisateur" id="utilisateur" required /><br/>
		<label for="mdp">Mot de passe: </label>
		<input type="password" name="mdp" id="mdp" required /><br/>		
		<input type="submit" value="Connexion"/>
	</form>
</div>

<div class="affichageResultat">
<?php
	if (isset($resultat) && $resultat == 1)
	// Mot de passe n'est pas bon
	{
?>
		<p class="erreur">Erreur: Le mot de passe n'est pas bon</p>	
<?php
	} else if (isset($resultat) && $resultat == -1) 
	// Utilisateur non-existant
	{
?> 	
<p class="erreur">Erreur: Utilisateur non-existant</p>	
<?php
	}
?>
</div>

<div id="creer_compte">
	<h5><a href="index.php?action=nouveauCompte">Créer un nouveau compte</a></h5>
</div>
		
		
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>