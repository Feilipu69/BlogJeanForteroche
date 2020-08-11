<?php
class Router
{
	private $frontController;

	public function __construct(){
		$this->frontController = new FrontController();
	}

	public function renderController(){
		if (isset($_GET['get'])) {
			if ($_GET['get'] === 'home') {
				$this->frontController->home();
			}
			elseif ($_GET['get'] === 'episode') {
				$this->frontController->getChapter($_GET['chapter']);
			}
			elseif ($_GET['get'] === 'addComment') {
				$this->frontController->addComment($_POST, $_GET['chapter']);
			}
			elseif ($_GET['get'] === 'rudeComment') {
				$this->frontController->rudeComment($_GET['id']);
			}
			elseif ($_GET['get'] === 'register') {
				$this->frontController->register($_POST);
			}
		}
		else {
			$this->frontController->home();
		}
	}
}
