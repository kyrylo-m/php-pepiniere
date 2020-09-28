<?php $titre = 'Catégories de produits'; ?>

<?php ob_start(); ?>

<div class="categories">
	<h2 class="nomPage">Catégories de nos produits:</h2>
	<ul>
		<li><a href="index.php?action=afficherCat&cat=1">Arbres fruitiers</a></li>
		<li><a href="index.php?action=afficherCat&cat=2">Arbres à noix</a></li>
		<li><a href="index.php?action=afficherCat&cat=3">Arbustes fruitiers</a></li>
	</ul>

<div class="imageProduitPetit">
	<a href="index.php?action=afficherCat&cat=1"><img src="public/images/abricotier.png"/></a>
	<a href="index.php?action=afficherCat&cat=2"><img src="public/images/amandier.jpg"/></a>
	<a href="index.php?action=afficherCat&cat=3"><img src="public/images/argousier.png"/></a>
</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>