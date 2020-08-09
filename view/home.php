<?php
foreach ($episodes as $episode) {
	?>
	<a href='<?= HOST; ?>episode?chapter=<?=strip_tags($episode->getChapter()); ?>'><h1><?=strip_tags($episode->getChapter()) . ' ' . strip_tags($episode->getTitle()); ?></a></h1>
	<p><em>Créé le <?= strip_tags($episode->getCreationDate()); ?></em></p>
	<p><?= strip_tags(substr($episode->getContent(), 0, 150)) . '...'; ?></p>
	<?php
}
