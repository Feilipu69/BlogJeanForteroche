<?php

class AdminController extends DbConnect
{
	public function administration(){
		$episode = new EpisodeManager();
		$episodes = $episode->getEpisodes();
		$comments = new CommentManager();
		$rudeComments = $comments->getRudeComments();
		$myView = new View('administration');
		$myView->render([
			'episodes' => $episodes,
			'rudeComments' => $rudeComments
		]);
	}

	public function addEpisode($post){
		if (isset($post['addEpisode'])) {
			if (!empty($post['chapter']) && !empty($post['title']) && !empty($post['content'])) {
				$episode = new EpisodeManager();
				$newEpisode = $episode->addEpisode($post);
				header('Location:home');
			}
		}
		$myView = new View('addEpisode');
		$myView->render([]);
	}

	public function updateEpisode($post, $chapter){
		if (isset($post['updateEpisode'])) {
			if (!empty($post['title']) && !empty($post['content'])) {
				$episode = new EpisodeManager();
				$updateEpisode = $episode->updateEpisode($post, $chapter);
			}
		}
		$myView = new View('updateEpisode');
		$myView->render([]);
	}

	public function deleteEpisode($chapter){
		$episode = new EpisodeManager();
		$deleteEpisode = $episode->deleteEpisode($chapter);
	}

	public function deleteComment($id){
		$comment = new CommentManager();
		$deleteComment = $comment->deleteComment($id);
	}
}
