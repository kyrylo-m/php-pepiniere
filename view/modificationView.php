<?php $titre = "Modification de commentaire"; ?>

<?php ob_start(); ?>

<div class="livredor">
	<h2 class="nomPage">Modification de commentaire</h2>
	
<?php
	if ($donnees = $reponse->fetch()){
		if ($donnees['auteur'] == $_SESSION['utilisateur']){
?>
		<h4>Votre commentaire à modifier:</h4>
		<div class="billet">
			<div class="enteteBillet">
			<p><strong><?= htmlspecialchars($donnees['auteur']); ?></strong> a écrit le <?= $donnees['date']; ?>:</p>
			</div>
			<p class="commentaire"><?= nl2br(htmlspecialchars($donnees['commentaire'])); ?></p> 
		</div>

		<h4>Nouvelle version du commentaire: </h4>
		<div class=formulaire>
		<form action="index.php?action=modifierCommentaire&id=<?= $donnees['id']; ?>" method="post">
			<label for="commentaire">Votre commentaire modifié: </label>
			<textarea rows="6" cols="60" name="commentaire" id="commentaire" required></textarea><br/>
			<input type="submit" value="Envoyer"/> 	
		</form>
		</div>
<?php
		}
		else {
?>
			<h4 class=error>Vous ne pouvez modifier que vos propres commentaires</h4>
<?php
		}
	}
	else {
?>
		<h4 class=error style="color: red;">Commentaire introuvable</h4>
<?php
	}
	$reponse->closeCursor();
?>

</div>

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>