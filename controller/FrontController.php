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

	public function addComment($post, $chapter){
		if (isset($post['submit'])) {
			if (!empty($post['pseudo']) && !empty($post['comment'])) {
				$manager = new CommentManager();
				$comment = $manager->addComment($post, $chapter);
				header('Location:episode?chapter=' . $chapter);
			}
		}
	}

	public function rudeComment($id){
		$manager = new CommentManager();
		$comment = $manager->getComment($id);
		$episodeId = $comment->getEpisodeId();
		$rudeComment = $manager->rudeComment($id);
		header('Location:episode?chapter=' . $episodeId);
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
					header('Location:home');
				}
			}
		}
		$myView = new View('register');
		$myView->render([]);
	}
}
