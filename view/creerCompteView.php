<?php //session_start(); ?>

<?php $titre = 'Créer compte'; ?>

<?php ob_start(); ?>

<div class="creerCompte">
<h2 class="nomPage"> Création de compte </h2>
<h4> Choisissez un nom d'utilisateur </h4>

<div id="login">
	<form id="choisirPseudo" class="formulaire" action="index.php?action=verifierPseudo" method="post">
		<label for="pseudo">Nom d'utilisateur: </label>
		<input type="text" name="pseudo" id="pseudo" required /><br/>
		<input type="submit" value="Vérifier le pseudo"/>		
	</form>
	
<div class="afficherResultat">
	<?php 
		if (isset($resultat)){
			if ($donnees = $resultat->fetch()){
				// Utilisateur avec ce pseudo deja existe
	?>
				<h4 class="erreur"> Erreur: Utilisateur avec le pseudo <?= htmlspecialchars($pseudo) ?> déjà existe, essayez un autre </h4>
	<?php				
			}
			else {
				$pseudoOk = true;		
	?>
				<h4 class="confirmation" style="color: blue;"> Le pseudo <?= htmlspecialchars($pseudo) ?> est disponible, procédez à remplir votre profil: </h4>
	<?php
			}	
			$resultat->closeCursor();
		}	
	?>
		
</div>
	
	<?php
		if (isset ($pseudo) && isset($pseudoOk) && $pseudoOk == true){
			$utilisateur = $pseudo;
		}
		else {	
			$utilisateur = "";
		}
	?>
	
	<h4> Remplissez tous les champs pour créer un compte </h4>
	<form class="formulaire" id="creerCompte" action="index.php?action=creerCompte" method="post">	
		<label for="utilisateur"> Nom d'utilisateur: </label>
		<input type="text" name="utilisateur" id="utilisateur" value="<?= $utilisateur ?>" readonly /><br/>
		<label for="mdp">Mot de passe: </label>
		<input type="password" name="mdp" id="mdp" required /><br/>	
		<label for="mdp2">Re-entrez mot de passe: </label>
		<input type="password" name="mdp2" id="mdp2" required /><br/>	
		<label for="prenom">Votre prénom: </label>
		<input type="text" name="prenom" id="prenom" required /><br/>
		<label for="nom">Votre nom de famille: </label>
		<input type="text" name="nom" id="nom" required /><br/>	
		<label for="courrile">Votre courriel: </label>
		<input type="email" name="courriel" id="courriel" required /><br/>
		<label for="adresse">Votre adresse: </label>
		<input type="text" name="adresse" id="adresse" required /><br/>	
		
		<input type="submit" value="Créer un compte"/>
	</form>
</div>
	<h4 id="erreur" class="erreur"></h4>
</div>
<script>
	document.getElementById('mdp2').addEventListener('input', function(){
			var erreur = document.getElementById('erreur');
			
			if (this.value != document.getElementById('mdp').value)
				erreur.innerHTML = "Les deux mots de passe ne correspondent pas";
			else
				erreur.innerHTML = '';		
		});
		
		// Verification de mots de passe et envoi du formulaire
		document.getElementById('creerCompte').addEventListener('submit', function(e){
			var erreur = '';
						
			if (document.getElementById('mdp2').value != document.getElementById('mdp').value)
				erreur = "Les deux mots de passe ne correspondent pas";
				
			if (erreur){
				e.preventDefault();
				document.getElementById('erreur').innerHTML = erreur;
			}
			else {
				document.getElementById('erreur').innerHTML = '';
				alert("Formulaire envoye!");				
			}
		});
</script>
		
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>