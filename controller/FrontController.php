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
		$manager = new EpisodeManager();
		$episode = $manager->getEpisode($chapter); 

		$episodeComments = new CommentManager();
		$comments = $episodeComments->getComments($chapter);

		$myView = new View('episode');
		$myView->render(
			[
				'episode' => $episode,
				'comments' => $comments
			]
		);
	}

	public function addComment($chapter){
		$manager = new CommentManager();
		$comment = $manager->addComment($chapter);
		header('Location:episode?chapter=' . $chapter);
	}

	public function rudeComment($id){
		$manager = new CommentManager();
		$comment = $manager->getComment($id);
		$episodeId = $comment->getEpisodeId();
		$rudeComment = $manager->rudeComment($id);
		header('Location:episode?chapter=' . $episodeId);
	}
}
