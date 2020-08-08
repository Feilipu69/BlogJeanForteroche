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
			<input type="text" name="author" id="author" required/>
			<br>
			<textarea name="comment" required></textarea>
			<br>
			<input type="submit" name='submit' />
			<a href="episode?chapter=<?= $episode->getChapter(); ?>"><input type="button" value="Annuler" /></a>
		</form>
	</div>
	<?php
	foreach ($comments as $comment) {
		?>
		<p><?= htmlspecialchars($comment->getAuthor()); ?>
		<br>
		<em>Ajouté le : <?= htmlspecialchars($comment->getDateComment()); ?></em></p>
		<p><?= htmlspecialchars($comment->getComment()); ?></p>
		<?php
	}
}
