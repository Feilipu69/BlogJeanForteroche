<?php
foreach ($episodes as $episode) {
	?>
	<a href='episode?chapter=<?=$episode->getChapter(); ?>'><h1><?=$episode->getChapter() . ' ' . $episode->getTitle(); ?></a></h1>
	<p><em>Créé le <?= $episode->getCreationDate(); ?></em></p>
	<p><?= $episode->getContent(); ?></p>
	<?php
}
