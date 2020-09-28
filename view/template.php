<!DOCTYPE html>
<html>
<head>
    <title> <?= $titre ?> </title>
    <meta charset="utf-8" />
	<link href="public/css/style.css" rel="stylesheet" /> 
</head>
		
<body onload = setInterval("rott()",50)>

<!--dégradé-->
<canvas id="canvas">
      <p>Désolé, votre navigateur ne supporte pas Canvas. Mettez-vous à jour</p> 
</canvas>
-->
<div id="pageFade"> <!--fade-in JS du contenu du div 'pageFade'-->
<img id="chataigneCurseur" src="public/images/chataigne.png" alt="un chataigne"/>
<div id="page">	
	
	<div id="entete">
	<div class="nav-area">
        <div class="logo"><img src="public/images/logo8.png" id="logo8"></div>
    </div>
		<h2>Bienvenue à la pépinière Labranche</h2>
	</div>
	
	<div id="menu">
	<?php 
	if (isset($_SESSION['estConnecte']) && $_SESSION['estConnecte'] == true){
	?>
		<ul class="navigation">
			<li><a href="index.php">Accueil</a></li>
			<li><a href="index.php?action=apropos">À propos de nous</a></li>
			<li><a href="index.php?action=contact">Contact</a></li>			
			<li><a href="index.php?action=produits">Produits</a></li>
			<li><a href="index.php?action=afficherLivre">Livre d'or</a></li>
			<li><a href="index.php?action=deconnexion">Déconnexion</a></li>
			<li id="themeSwitcher" onclick="myFunction()"><a href="#">Changer thème</a></li>
		</ul>
	<?php
	}
	else {
	?>	
		<ul class="navigation">
			<li><a href="index.php">Accueil</a></li>
			<li><a href="index.php?action=contact">Contact</a></li>
			<li><a href="index.php?action=connexion">Connexion</a></li>		
			<li id="themeSwitcher" onclick="myFunction()"><a href="#">Changer thème</a></li>
		</ul>
	<?php 
	}
	?>
	</div >
	
	<div id="contenu" >
			
		<?= $contenu ?>	
	
	</div>
	
	<div id="pied" style="background-image:url(public/images/pied.jpg);">
	<div id="utilisateurConnecte">
	<?php
		if (isset($_SESSION['utilisateur']) && isset($_SESSION['estConnecte']) && $_SESSION['estConnecte'] == true){
	?>
		<h4>Utilisateur connecté: <?= htmlspecialchars($_SESSION['utilisateur']) ?></h4>
	<?php
		}
		else {
	?>
		<h4>Pas d'utilisateur connecté</h4>
	<?php			
		}
	?>
	</div>
	
	<div id="date">
		<p>Aujourd'hui c'est le <?= date("d/m/Y")?> </p>	
	</div>
	
	<div id="nbrVisites">
	<?php
		if (isset($_SESSION['nbrVisites'])){
	?>
		<p>Notre site a été visité <strong><?= $_SESSION['nbrVisites'] ?></strong> fois</p>
	<?php
		}
	?>
	</div>
	
	<div id="copyright">
		<p>Copyright Fatou-Kyrylo-Kemberly-Rickie Lea - 2020-2021 - All Right Reserved</p>
	</div>
	</div>
	
</div>
<!--fin dégradé "pageFade"--> 
<script type="text/javascript" src="public/js/cssbackchange.js"></script>
<script type="text/javascript" src="public/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="public/js/scripts.js"></script>
</div> <!--fin dégradé "pageFade"--> 
</body>
</html>