<?php $titre = 'Contacts'; ?>

<?php ob_start(); ?>

<div class ="contactPage">
              
                <h2 class="nomPage">Contacts</h2>
                <div class="adress">
                    <p>6400 16e Avenue, Montréal, QC H1X 2S9</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7142.111606435997!2d-73.5886675622943!3d45.5560931375342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91eace22b9bcf%3A0x18799aed17aa23d9!2sColl%C3%A8ge%20de%20Rosemont!5e0!3m2!1sfr!2sca!4v1596519664789!5m2!1sfr!2sca"
                    width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <p> 
                        Pour nous rejoindre: <br/>
                        Téléphone: (514)110-1111 <br/>
                        Télécopieur: (514)110-1111
                    </p>
                </div>


<h4>Vous pouvez nous envoyer un message: </h4>
<div class=formulaire>
<form action="index.php?action=envoiContact" method="post">
	<label for="nom">Votre nom: </label>
	<input type="text" name="nom" id="nom" required /><br/>
	<label for="courriel">Votre courriel: </label>
	<input type="email" name="courriel" id="courriel" required /><br/>	
	<label for="message">Message: </label>
	<textarea rows="4" cols="60" name="message" id="message" required></textarea><br/>
	<input type="submit" value="Envoyer"/> 	<br/>
</form>
</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>