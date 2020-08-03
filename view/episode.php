<a href='home'>Accueil</a>
<h1>Chapitre <?= $episode->getChapter() . ' : ' . $episode->getTitle(); ?></h1>
<p><?= $episode->getContent(); ?></p>
<p><strong>Commentaires</strong></p>
<?php
foreach ($comments as $comment) {
	?>
	<p><?= $comment->getAuthor(); ?>
	<br>
	<em>Ajouté le : <?= $comment->getDateComment(); ?></em></p>
	<p><?= $comment->getComment(); ?></p>
	<?php
}

