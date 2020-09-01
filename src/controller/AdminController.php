<?php
namespace Bihin\Forteroche\src\controller;
use Bihin\Forteroche\src\DAO\{
	DbConnect,
	EpisodeManager,
	CommentManager,
	UserManager
};
use Bihin\Forteroche\utils\View;

class AdminController extends DbConnect
{
	public function checkLogin(){
		if ($_SESSION['login'] !== 'Jean') {
			header('Location:index.php?get=home');
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
					header('Location:index.php?get=home');
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
			$episodeDatas = $episode->getEpisode($chapter);
			if (isset($post['updateEpisode'])) {
				if (!empty($post['title']) && !empty($post['content'])) {
					$updateEpisode = $episode->updateEpisode($post, $chapter);
				}
			}
			$myView = new View('updateEpisode');
			$myView->render([
				'episodeDatas' => $episodeDatas
			]);
		}
	}

	public function deleteEpisode($chapter){
		if ($this->checkLogin()) {
			$episode = new EpisodeManager();
			$deleteEpisode = $episode->deleteEpisode($chapter);
		}
	}

	public function deleteComment($id){
		if ($this->checkLogin()) {
			$comment = new CommentManager();
			$deleteComment = $comment->deleteComment($id);
		}
	}

	public function deleteUser($id){
		if ($this->checkLogin()) {
			$user = new UserManager();
			$deleteUser = $user->deleteUser($id);
			header('Location:index.php?get=administration');
		}
	}
}
