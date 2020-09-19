<?php
namespace Bihin\Forteroche\src\controller;
use Bihin\Forteroche\src\DAO\{
	EpisodeManager,
	CommentManager,
	UserManager
};
use Bihin\Forteroche\utils\View;

class AdminController 
{
	public function checkLogin(){
		if ($_SESSION['login'] !== 'Jean') {
			header('Location:' . HOST);
		} else {
			return true;
		}
	}

	public function administration(){
		if ($this->checkLogin()) {
			$episode = new EpisodeManager();
			$episodes = $episode->getEpisodes();
			$comments = new CommentManager();
			$rudeComments = $comments->getRudeComments();
			$user = new UserManager();
			$users = $user->getUsers();
			$myView = new View('administration');
			$myView->render([
				'episodes' => $episodes,
				'rudeComments' => $rudeComments,
				'users' => $users
			]);
		}
	}

	public function addEpisode($post){
		if ($this->checkLogin()) {
			$episode = new EpisodeManager();
			$episodes = $episode->getEpisodes();
			$newChapter = end($episodes)->getChapter() + 1;
			if (isset($post['addEpisode'])) {
				if (!empty($post['chapter']) && !empty($post['title']) && !empty($post['content'])) {
					$newEpisode = $episode->addEpisode($post);
					header('Location:' . HOST);
				}
			}

			$myView = new View('addEpisode');
			$myView->render([
				'newChapter' => $newChapter
			]);
		}
	}

	public function updateEpisode($post, $parameter){
		if ($this->checkLogin()) {
			$episode = new EpisodeManager();
			$episodeData = $episode->getEpisode($parameter);
			if (isset($post['updateEpisode'])) {
				if (!empty($post['title']) && !empty($post['content'])) {
					$updateEpisode = $episode->updateEpisode($post, $parameter);
					header('Location:' . HOST);
				}
			}

			$myView = new View('updateEpisode');
			$myView->render([
				'episodeData' => $episodeData
			]);
		}
	}

	public function deleteEpisode($parameter){
		if ($this->checkLogin()) {
			$episode = new EpisodeManager();
			$deleteEpisode = $episode->deleteEpisode($parameter);
			$comments = new CommentManager();
			$deleteComments = $comments->deleteComments($parameter);
			header('Location:' . HOST . '/administration');
		}
	}

	public function deleteComment($parameter){
		if ($this->checkLogin()) {
			$comment = new CommentManager();
			$deleteComment = $comment->deleteComment($parameter);
			header('Location:' . HOST . '/administration');
		}
	}

	public function deleteUser($parameter){
		if ($this->checkLogin()) {
			$user = new UserManager();
			$deleteUser = $user->deleteUser($parameter);
			header('Location:' . HOST . '/administration');
		}
	}
}
