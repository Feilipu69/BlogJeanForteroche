<?php

$episode = new EpisodeManager();
$episodes = $episode->getEpisodes();
foreach ($episodes as $episode) {
	?>
	<h1><?=$episode->getChapter() . ' ' . $episode->getTitle(); ?></h1>
	<p><em>Créé le <?= $episode->getCreationDate(); ?></em></p>
	<p><?= $episode->getContent(); ?></p>
	<?php
}
