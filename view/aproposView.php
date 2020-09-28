<?php $titre = 'À propos de nous'; ?>

<?php ob_start(); ?>

<div class="apropos">
	<h2 class="nomPage">Un peu d'histoire</h2>
	<div class="histoire">
        <p> <strong>Pépinière Labranche</strong>, c'est avant tout une affaire de passion qui a débuté il y a déjà 15 ans. Nous vous proposons plusieurs diversités de plantes que vous pouvez faire poussé dans votre jardin ou à l'intérieur de votre chez soi.
        </p>
	</div>
    
	<img src ="public/images/propos1.jpg" alt="pepiniere" title="pepiniere"/>	

	<h2 class="nomPage">Notre Mission</h2>
	<div class="mission">
                           
        <p> Nous mettons à la disposition de la population de la région de Grande Montréal des jeunes plantes qu'ils pourront faire pousser chez eux et en profiter pleinement des bienfaits. Depuis la création de la <strong>Pépinière Labranche</strong>, nous avons pu rendre heureux des milliers de familles.</p>
                                    
		<p> Nous envisageons amener plus de jeunes à s'intéresser à la nature et à  ses innombrables bienfaits pour un meilleur avenir. Ceci est <strong>l'héritage</strong> que nous laissons à la future génération!</p>
	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>