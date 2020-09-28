<?php $titre = 'Merci'; ?>

<?php ob_start(); ?>

<div class="pageMerci">
<h2 class="nomPage"> Merci de nous avoir écrit </h2>
<p> Merci <strong><?= htmlspecialchars($nom) ?></strong>, nous vous repondrons sous peu à <strong><?= htmlspecialchars($courriel) ?></strong></p>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require('template.php'); ?>