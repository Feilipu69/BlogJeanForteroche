<?php
namespace Bihin\Forteroche\src\controller;
use Bihin\Forteroche\src\DAO\{
	EpisodeManager,
	CommentManager,
	FlagCommentManager,
	UserManager
};
use Bihin\Forteroche\utils\View;

class AdminController 
{
	public function checkLogin(){
		if ($_SESSION['roleId'] !== 'admin') {
			header('Location:' . HOST);
		} else {
			return true;
		}
	}

	public function administration(){
		if ($this->checkLogin()) {
			$episode = new EpisodeManager();
			$episodes = $episode->getEpisodes();
			$flags = new FlagCommentManager();
			$rudeComments = $flags->getFlagsComments();
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

	public function updateEpisode($post, $chapter){
		if ($this->checkLogin()) {
			$episode = new EpisodeManager();
			$episodeData = $episode->getEpisode($chapter);
			if (isset($post['updateEpisode'])) {
				if (!empty($post['title']) && !empty($post['content'])) {
					$updateEpisode = $episode->updateEpisode($post, $chapter);
					header('Location:' . HOST);
				}
			}

			$myView = new View('updateEpisode');
			$myView->render([
				'episodeData' => $episodeData
			]);
		}
	}

	public function deleteEpisode($chapter){
		if ($this->checkLogin()) {
			$episode = new EpisodeManager();
			$deleteEpisode = $episode->deleteEpisode($chapter);
			$comments = new CommentManager();
			$deleteComments = $comments->deleteCommentsByEpisode($chapter);
			header('Location:' . HOST . '/administration');
		}
	}

	public function deleteComment($commentId){
		if ($this->checkLogin()) {
			$flag = new FlagCommentManager();
			$deleteFlag = $flag->deleteFlagComment($commentId);
			$comment = new CommentManager();
			$deleteComment = $comment->deleteComment($commentId);
			header('Location:' . HOST . '/administration');
		}
	}

	public function deleteUser($userId){
		if ($this->checkLogin()) {
			$user = new UserManager();
			$deleteUser = $user->deleteUser($userId);
			header('Location:' . HOST . '/administration');
		}
	}
}
