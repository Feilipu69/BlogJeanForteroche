<?php
if (!isset($_SESSION['login'])) {
	?>
	<div class="jumbotron">
		<p class="h3 text-primary">Bienvenue chères lectrices et chers lecteurs.</p>
		<p>Avec ce nouveau roman, j'ai voulu vous donner la possibilité de participer à sa rédaction via <strong>vos avis et commentaires</strong>.
		<br>
		Si l'aventure vous tente, n'hésitez plus et <strong><a href="<?= HOST; ?>/inscription">inscrivez-vous</a></strong>.
		<br>
		Merci à vous et bonne lecture.
		<br>
		Jean Forteroche
		</p>
	</div>
	<?php
}
?>
<div class="row">
	<?php
	foreach ($episodes as $episode) {
		?>
		<div class="card-deck col-md-4">
			<div class="card mb-3 border rounded shadow">
				<div class="card-body">
					<a href="<?= HOST; ?>/episode/<?=strip_tags($episode->getChapter()); ?>"><h3 class="card-title"><?=strip_tags($episode->getChapter()) . '. ' . strip_tags($episode->getTitle()); ?></h3></a>
					<p><em>Ecrit le <?= strip_tags($episode->getCreationDate()); ?></em></p>
					<p class="card-text"><?= strip_tags(substr($episode->getContent(), 0, 150)) . '...'; ?></p>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>
