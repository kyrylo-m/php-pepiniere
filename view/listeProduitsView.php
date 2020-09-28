<?php $titre = 'Nos produits'; ?>

<?php ob_start(); ?>

<div class="listeProduits">
		<h2 class="nomPage">Liste de nos produits </h2>
		
		<h3>Catégorie: <?= $nomCat ?></h3>
			
	<?php
		while($produit = $produits->fetch())
		{
	?>		<div><a href="index.php?action=afficherProd&id=<?= $produit['id'] ?>"> <?= $produit['nom'] ?> 
					
			<div class="imageProduitMoyen">
				<?php $photoSrc = "public/images/".$produit['photo']?>
				<img src="<?= $photoSrc ?>"/>
			</div></a>
			</div>	
	<?php
		}	
		$produits->closeCursor();
	?>
			
		
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>