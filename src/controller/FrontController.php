<?php
namespace Bihin\Forteroche\src\controller;
use Bihin\Forteroche\src\DAO\{
	DbConnect,
	EpisodeManager,
	CommentManager,
	UserManager
};
use Bihin\Forteroche\utils\View;

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
		$episodes = $manager->getEpisodes();
		$episode = $manager->getEpisode($chapter); 

		$episodeComments = new CommentManager();
		$comments = $episodeComments->getComments($chapter);

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
			if (!empty($post['author']) && !empty($post['comment'])) {
				$manager = new CommentManager();
				$comment = $manager->addComment($post, $chapter);
				header('Location:index.php?get=episode&chapter=' . $chapter);
			}
		}
	}

	public function rudeComment($id){
		$manager = new CommentManager();
		if (!$_SESSION['rudeComment']) {
			$_SESSION['rudeComment'] = 1;
			$rudeComment = $manager->rudeCommentPlus($id);
		} else {
			$rudeComment = $manager->rudeCommentLess($id);
			$_SESSION['rudeComment'] = 0;
		}
		$chapter = $manager->getEpisodeIdById($id);
		header('Location:index.php?get=episode&chapter=' . $chapter->getEpisodeId());
	}

	public function connection($post){
		if (isset($post['connection'])) {
			if (!empty($post['login']) && !empty($post['password'])) {
				$manager = new UserManager();
				if ($manager->checkPassword($post)) {
					$_SESSION['login'] = $post['login'];
					$roleId = $manager->getUserDatas();
					$_SESSION['roleId'] = $roleId->getName();
					header('Location:index.php?get=home');
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
					$userId = $manager->getUserDatas();
					$_SESSION['userId'] = $userId->getId();
					header('Location:index.php?get=home');
				}
			}
		}

		$myView = new View('register');
		$myView->render([]);
	}

	public function updateDatas($post){
		$manager= new UserManager();
		$userDatas = $manager->getUserDatas();
		if (isset($post['updateDatas'])) {
			if (!empty($post['login']) && !empty($post['password']) && !empty($post['email'])) {
				if ($manager->checkUser($post)) {
					echo 'Ce login existe déjà.';
				}
				else {
					$manager->updateDatas($post);
					$_SESSION['login'] = $post['login'];
					header('Location:index.php?get=home');
				}
			}
		}

		$myView = new View('updateDatas');
		$myView->render([
			'userDatas' => $userDatas
		]);
	}

	public function disconnection(){
		if (isset($_SESSION['login'])) {
			 unset($_SESSION['login']);
			session_destroy();
			header('Location:index.php?get=home');
		}
	}

	public function deleteCount($login){
		$manager = new UserManager();
		$manager->deleteCount($login);
		unset($_SESSION['login'], $_SESSION['userId']);
		header('Location:index.php?get=home');
	}
}
