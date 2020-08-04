<?php
class FrontController extends DbConnect
{
	public function home(){
		$episode = new EpisodeManager();
		$episodes = $episode->getEpisodes();

		$myView = new View('home');
		$myView->render(['episodes' => $episodes]);
	}

	public function getChapter(){
		$manager = new EpisodeManager($this->db);
		$episode = $manager->getEpisode($_GET['chapter']); 

		$episodeComments = new CommentManager($this->db);
		$comments = $episodeComments->getComments($_GET['chapter']);

		$myView = new View('episode');
		$myView->render(
			[
				'episode' => $episode,
				'comments' => $comments
			]
		);
	}
}
