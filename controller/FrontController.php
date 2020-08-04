<?php
class FrontController extends DbConnect
{
	public function home(){
		$episode = new EpisodeManager();
		$episodes = $episode->getEpisodes();

		$myView = new View('home');
		$myView->render(['episodes' => $episodes]);
	}

	public function getChapter($chapter){
		$manager = new EpisodeManager($this->db);
		$episode = $manager->getEpisode($chapter); 

		$episodeComments = new CommentManager($this->db);
		$comments = $episodeComments->getComments($chapter);

		$myView = new View('episode');
		$myView->render(
			[
				'episode' => $episode,
				'comments' => $comments
			]
		);
	}
}
