<a href='<?= HOST; ?>home'>Accueil</a>
<h1>Chapitre <?= $episode->getChapter() . ' : ' . $episode->getTitle(); ?></h1>
<p><?= $episode->getContent(); ?></p>
<?php
if (isset($comments)) {
	?>
	<p><strong>Commentaires</strong></p>
	<div>
		<form method=post action='<?= HOST; ?>addComment?chapter=<?= $episode->getChapter(); ?>'>
			<label for="author">Pseudo : </label>
			<input type="text" name="author" id="author" />
			<br>
			<textarea name="comment"></textarea>
			<br>
			<input type="submit" name='submit' />
		</form>
	</div>
	<?php
	foreach ($comments as $comment) {
		?>
		<p><?= $comment->getAuthor(); ?>
		<br>
		<em>Ajouté le : <?= $comment->getDateComment(); ?></em></p>
		<p><?= $comment->getComment(); ?></p>
		<?php
	}
}
