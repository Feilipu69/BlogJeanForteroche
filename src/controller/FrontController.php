<?php
namespace Bihin\Forteroche\src\controller;
use Bihin\Forteroche\src\DAO\{
	CommentManager,
	EpisodeManager,
	FlagCommentManager,
	UserManager
};
use Bihin\Forteroche\utils\View;

class FrontController 
{
	public function home(){
		$episode = new EpisodeManager();
		$episodes = $episode->getEpisodes();

		$myView = new View('home');
		$myView->render(['episodes' => $episodes]);
	}

	public function getEpisode($chapter){
		$manager = new EpisodeManager();
		$episodes = $manager->getEpisodes();
		$episode = $manager->getEpisode($chapter); 

		$episodeComments = new CommentManager();
		$comments = $episodeComments->getComments($chapter);

		if (!empty($comments)) {
			$flagsManager = new FlagCommentManager();
			foreach ($comments as $comment) {
				$comment->setNbreComment($flagsManager->countAllFlags($comment->getId()));
			}
		}

		$myView = new View('episode');
		$myView->render(
			[
				'episode' => $episode,
				'episodes' => $episodes,
				'comments' => $comments
			]
		);
	}

	public function addComment($post, $chapter){
		if (isset($post['submit'])) {
			if (!empty($post['login']) && !empty($post['comment'])) {
				$manager = new CommentManager();
				$comment = $manager->addComment($post, $chapter);
				header('Location:' . HOST . '/episode/' . $chapter);
			}
		}
	}

	public function rudeComment($commentId){
		$flagManager = new FlagCommentManager();
		$manager = new CommentManager();
		$flagByUser = $flagManager->countFlag($commentId);

		if ($flagByUser[0] === '0') {
			$flagcomment = $manager->commentFlagged($commentId);
			$addFlag = $flagManager->flagCommentPlus($commentId);
		} else {
			$unflagComment = $manager->commentUnflagged($commentId);
			$lessFlag = $flagManager->flagCommentLess($commentId);
		}

		$comment = $manager->getComment($commentId);
		$episode = $comment->getEpisodeId(); header('Location:' . HOST . '/episode/' . $episode); 
	}

	public function connection($post){
		if (isset($post['connection'])) {
			if (!empty($post['login']) && !empty($post['password'])) {
				$manager = new UserManager();
				if ($manager->checkPassword($post)) {
					$_SESSION['login'] = $post['login'];
					$roleId = $manager->getUserData();
					$_SESSION['roleId'] = $roleId->getName();
					header('Location:' . HOST);
				} else {
					$_SESSION['errors'] = "Login ou mot de passe incorrectes";
				}
			}
		}

		$myView = new View('connection');
		$myView->render([]);
	}

	public function register($post){
		if (isset($post['register'])) {
			if (!empty($post['login']) && !empty($post['password']) && !empty($post['email'])) {
				$manager= new UserManager();
				if ($manager->checkUser($post)) {
					$_SESSION['registerError'] = 'Ce login existe déjà';
				}
				else {
					$manager->register($post);
					$_SESSION['login'] = $post['login'];
					//$userId = $manager->getUserData();
					$userId = $manager->getUser();
					$_SESSION['userId'] = $userId->getId();
					header('Location:' . HOST);
				}
			}
		}

		$myView = new View('register');
		$myView->render([]);
	}

	public function updateData($post){
		if (isset($_SESSION['login'])) {
			$manager= new UserManager();
			$userData = $manager->getUserData();
			if (isset($post['updateData'])) {
				if (!empty($post['login']) && !empty($post['password']) && !empty($post['email'])) {
					if ($manager->checkUser($post)) {
						echo 'Ce login existe déjà.';
					}
					else {
						$manager->updateData($post);
						$_SESSION['login'] = $post['login'];
						header('Location:' . HOST);
					}
				}
			}

			$myView = new View('updateData');
			$myView->render([
				'userData' => $userData
			]);
		} else {
			header('Location:' . HOST);
		}
	}

	public function disconnection(){
		if (isset($_SESSION['login']) || isset($_SESSION['errors']) || isset($_SESSION['registerError'])) {
			unset($_SESSION['login'], $_SESSION['errors'], $_SESSION['registerError']);
			session_destroy();
			header('Location:' . HOST);
		}
	}

	public function deleteCount($login){
		$manager = new UserManager();
		$manager->deleteCount($login);
		/*
		unset($_SESSION['login'], $_SESSION['userId'], $_SESSION['errors'], $_SESSION['registerError']);
		session_destroy();
		header('Location:' . HOST);
		*/
		$this->disconnection();
	}
}
