<div class="row">
	<?php
	foreach ($episodes as $episode) {
		?>
		<div class="card-deck col-md-4">
			<div class="card mb-3 border rounded shadow">
				<div class="card-body">
					<a href='index.php?get=episode&chapter=<?=strip_tags($episode->getChapter()); ?>'><h3 class="card-title"><?=strip_tags($episode->getChapter()) . '. ' . strip_tags($episode->getTitle()); ?></h3></a>
					<p><em>Créé le <?= strip_tags($episode->getCreationDate()); ?></em></p>
					<p class="card-text"><?= strip_tags(substr($episode->getContent(), 0, 150)) . '...'; ?></p>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>
