<?php $titre = 'Accueil'; ?>

<?php ob_start(); ?>
<div class="accueil" >
<img src="public/images/accueil.jpg" width="100%" height="100%" id="back">

<div class="banner-text">
	<h2> Bienvenue à la Pépinière <span>Labranche</span></h2><br>
	<p>La nature à vos portes<p>					
					
</div>

<div class="banner-text">
<?php
	if (isset($compteCree) && $compteCree == true){
?>
		<h4>Nouveau compte créé avec succès</h4>
<?php
	}
	
	if (isset ($_SESSION['utilisateur']) && isset($_SESSION['estConnecte']) && $_SESSION['estConnecte'] == true && isset($justConnected) && $justConnected == true){		
?>
		<h4> Nous sommes heureux de vous voir <?= htmlspecialchars($_SESSION['utilisateur']) ?>!</h4>	

<?php
		$_SESSION['nbrVisites'] = compter();
	}
?>
</div>
</div>
<?php
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
?>

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>