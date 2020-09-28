<?php $titre = 'Page de produit'; ?>

<?php ob_start(); ?>

<div class="produit">

<?php
	if ($donnees = $produit->fetch())
	{
?>		
		<h2 class="nomPage">Page de produit: <?= $donnees['nom'] ?> </h2>
		<p><strong>Catégorie:
<?php
		if ($donnees['categorie'] == 1)
			echo " Arbres fruitiers";
		elseif ($donnees['categorie'] == 2)
			echo " Arbres à noix";
		else
			echo " Arbustes fruitiers";
?>
		</strong></p>
		<div class="descriptionProduit">
			<p><?= $donnees['description'] ?></p>
			<p>Prix: <strong><?= $donnees['prix'] ?> $ </strong>par unité </p>
			<p>Quantité disponible: <strong> <?= $donnees['quantite'] ?></strong></p>	
		</div>
		
		<div class="imageProduitGrand">
			<?php $photoSrc = "public/images/".$donnees['photo']?>
			<img src="<?= $photoSrc ?>"/>
		</div>
	
<?php
	}
	else
	{
		echo "Produit introuvable";
	}
	$produit->closeCursor();
?>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>