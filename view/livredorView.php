<?php $titre = "Livre d'or"; ?>

<?php ob_start(); ?>

<div class="livredor">
	<h2 class="nomPage">Notre Livre d'or:</h2>
	
<?php
	while ($donnees = $reponse->fetch()){
?>
		<div class="billet">
			<div class="enteteBillet">
			<p><strong><?= htmlspecialchars($donnees['auteur']); ?></strong> a écrit le <?= $donnees['date']; ?>:</p>
			</div>
			<p class="commentaire"><?= nl2br(htmlspecialchars($donnees['commentaire'])); ?></p> 
			<?php
			if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur'] == $donnees['auteur'])
			{
?>		
				<p><a href="index.php?action=afficherCommentaire&id=<?= $donnees['id']; ?>">Modifier commentaire</a></p>
<?php				
			}
?>	
			<p class="classement">Est-ce que vous trouvez ce commentaire utile? <span id="moins"><a href="index.php?action=voter&id=<?= $donnees['id'];?>&vote=moins"> - </a></span><span><strong> <?= $donnees['classement'];?> </strong></span><span id="plus"><a href="index.php?action=voter&id=<?= $donnees['id'];?>&vote=plus"> + </a></span></p>		
			
		</div>
<?php
	}
	$reponse->closeCursor();
?>

<h4>Laisser un commentaire: </h4>
<div class=formulaire>
	<form action="index.php?action=envoiCommentaire" method="post">
		<label for="commentaire">Votre commentaire: </label>
		<textarea rows="6" cols="60" name="commentaire" id="commentaire" required></textarea><br/>
		<input type="submit" value="Envoyer"/> 	
	</form>
</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>