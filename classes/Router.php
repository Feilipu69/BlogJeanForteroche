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
			elseif ($_GET['get'] === 'connection') {
				$this->frontController->connection($_POST);
			}
			elseif ($_GET['get'] === 'register') {
				$this->frontController->register($_POST);
			}
			elseif ($_GET['get'] === 'updateDatas') {
				$this->frontController->updateDatas($_POST);
			}
			elseif ($_GET['get'] === 'disconnection') {
				$this->frontController->disconnection();
			}
			elseif ($_GET['get'] === 'deleteCount') {
				$this->frontController->deleteCount($_SESSION['login']);
			}
			elseif ($_GET['get'] === 'administration') {
				$this->frontController->administration();
			}
			elseif($_GET['get'] === 'addEpisode'){
				$this->frontController->addEpisode($_POST);
			}
			elseif ($_GET['get'] === 'updateEpisode') {
				$this->frontController->updateEpisode($_POST, $_GET['chapter']);
			}
		}
		else {
			$this->frontController->home();
		}
	}
}
