<h1>Chapitre <?= strip_tags($episode->getChapter()) . ' : ' . strip_tags($episode->getTitle()); ?></h1>
<p><?= strip_tags($episode->getContent()); ?></p>
<?php
if (isset($comments) && isset($_SESSION['login'])) {
	?>
	<p><strong>Commentaires</strong></p>
	<div>
		<form method="post" action="<?= HOST; ?>addComment?chapter=<?= strip_tags($episode->getChapter()); ?>">
			<label for="author">Pseudo : </label>
			<input type="text" name="author" id="author" required/>
			<br>
			<label for="comment">Commentaire</label>
			<br>
			<textarea name="comment" required></textarea>
			<br>
			<input type="submit" name='submit' />
			<a href="episode?chapter=<?= strip_tags($episode->getChapter()); ?>"><input type="button" value="Annuler" /></a>
		</form>
	</div>
	<?php
	foreach ($comments as $comment) {
		?>
		<div>
		<p><?= strip_tags($comment->getAuthor()); ?>
		<br>
		<em>Ajouté le : <?= strip_tags($comment->getDateComment()); ?></em></p>
		<p><?= strip_tags($comment->getComment()); ?></p>
		<p>Signalement(s) du commentaire : <?= strip_tags($comment->getRudeComment()); ?></p>
		<div>
		<p><a href="<?= HOST; ?>rudeComment?id=<?=strip_tags($comment->getId()); ?>"><input type="button" value="Signaler le commentaire" /></a></p>
		<?php
	}
}
?>
