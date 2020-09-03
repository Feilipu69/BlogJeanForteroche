<div class="mx-auto col-lg-9">
	<div class="border rounded shadow p-3">
		<h2 class="text-info">Chapitre <?= strip_tags($episode->getChapter()) . ' : ' . strip_tags($episode->getTitle()); ?></h2>
		<p><?= strip_tags($episode->getContent()); ?></p>
	</div>

	<div>
		<nav aria-label="pagination" class="mt-3">
			<ul class="pagination d-flex justify-content-center">
				<?php
				if ($episode->getChapter() > 1) {
					?>
					<li class="page-item order-0"><a class="page-link" href="index.php?get=episode&chapter=<?= $episode->getChapter() - 1; ?>">Précédent</a></li>
					<?php
				}
				$lastChapter = end($episodes)->getChapter(); 
				if ($episode->getChapter() < $lastChapter) {
					?>
					<li class="page-item order-2"><a class="page-link" href="index.php?get=episode&chapter=<?= $episode->getChapter() + 1; ?>">Suivant</a></li>
					<?php
				}
				?>

				<?php
				foreach($episodes as $episodePage) {
					?>
					<li class="page-item order-1"><a class="page-link" href="index.php?get=episode&chapter=<?= $episodePage->getChapter(); ?>"><?= $episodePage->getChapter(); ?></a></li>
					<?php
				}
				?>
			</ul>
		</nav>
	</div>

	<?php
	if (isset($comments) && isset($_SESSION['login'])) {
		?>
		<div class="mt-3">
			<h3 class="bg-dark text-white text-center">Commentaires</h3>
			<p class="lead mt-3 font-weight-bold text-info">Ajouter un commentaire</p>
			<div>
				<form method="post" action="index.php?get=addComment&chapter=<?= strip_tags($episode->getChapter()); ?>">
					<div class="form-group">
						<label for="author">Pseudo : </label>
						<input type="text" name="author" id="author" required/>
					</div>
					<div class="form-group">
						<label for="comment">Commentaire :</label>
						<br>
						<textarea name="comment"  rows="3" class="form-control mb-3" required></textarea>
						<br>
						<input type="submit" name='submit' class="btn btn-dark" />
						<a href="episode?chapter=<?= strip_tags($episode->getChapter()); ?>"><input type="button" value="Annuler" class="btn btn-dark" /></a>
					</div>
				</form>
			</div>
			<table class="table table-striped">
				<?php
				foreach ($comments as $comment) {
					?>
					<tr id="commentaires">
						<td>
							<p><strong><?= strip_tags($comment->getAuthor()); ?></strong> : </p>
							<p><em>Ajouté le : <?= strip_tags($comment->getDateComment()); ?></em></p>
							<p><?= strip_tags($comment->getComment()); ?></p>
							<p><em>Signalement(s) du commentaire : </em><?= strip_tags($comment->getRudeComment()); ?></p>
							<p><a href="index.php?get=rudeComment&id=<?=strip_tags($comment->getId()); ?>#commentaires"><input type="button" value="Signaler le commentaire" class="btn btn-outline-secondary" /></a></p>
						</td>
					</tr>
					<?php
				}
				?>
			</table>
			<?php
		}
		?>
	</div>
</div>
