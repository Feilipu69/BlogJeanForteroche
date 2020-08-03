<?php
class EpisodeController extends DbConnect
{
	public function getChapter(){
		$manager = new EpisodeManager($this->db);
		$episode = $manager->getEpisode($_GET['chapter']); 

		$myView = new View('episode');
		$myView->render(['episode' => $episode]);
	}
}
