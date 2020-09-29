<?php
namespace Bihin\Forteroche\src\controller;
use Bihin\Forteroche\src\DAO\{
	EpisodeManager,
	CommentManager,
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

	public function getChapter($parameter){
		$manager = new EpisodeManager();
		$episodes = $manager->getEpisodes();
		$episode = $manager->getEpisode($parameter); 

		$episodeComments = new CommentManager();
		$comments = $episodeComments->getComments($parameter);

		$myView = new View('episode');
		$myView->render(
			[
				'episode' => $episode,
				'episodes' => $episodes,
				'comments' => $comments
			]
		);
	}

	public function addComment($post, $parameter){
		if (isset($post['submit'])) {
			if (!empty($post['author']) && !empty($post['comment'])) {
				$manager = new CommentManager();
				$comment = $manager->addComment($post, $parameter);
				header('Location:' . HOST . '/episode/' . $parameter);
			}
		}
	}

	public function rudeComment($parameter){
		$manager = new CommentManager();
		$comment = $manager->getComment($parameter);
		$disliker = $comment->getDisliker();
		if (isset($_SESSION['login']) && $disliker === $_SESSION['login']) {
			$rudeComment = $manager->rudeCommentLess($parameter);
		} elseif ($disliker !== $_SESSION['login']) {
			$rudeComment = $manager->rudeCommentPlus($parameter);
		}
		$chapter= $comment->getEpisodeId();
		header('Location:' . HOST . '/episode/' . $chapter);
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
					echo 'Données incorrectes';
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
					echo 'Ce login existe déjà.';
				}
				else {
					$manager->register($post);
					$_SESSION['login'] = $post['login'];
					$userId = $manager->getUserData();
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
		if (isset($_SESSION['login'])) {
			unset($_SESSION['login']);
			session_destroy();
			header('Location:' . HOST);
		}
	}

	public function deleteCount($login){
		$manager = new UserManager();
		$manager->deleteCount($login);
		unset($_SESSION['login'], $_SESSION['userId']);
		header('Location:' . HOST);
	}
}
