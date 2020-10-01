<?php
namespace Bihin\Forteroche\classes;
use Bihin\Forteroche\src\controller\{
	FrontController,
	AdminController
};

class Router
{
	private $frontController;
	private $adminController;

	public function __construct(){
		$this->frontController = new FrontController();
		$this->adminController = new AdminController();
	}

	public function renderController(){
		if (isset($_GET['route'])) {
			if ($_GET['route'] === HOST) {
				$this->frontController->home();
			}
			elseif ($_GET['route'] === 'episode') {
				$this->frontController->getEpisode($_GET['parameter']);
			}
			elseif ($_GET['route'] === 'addComment') {
				$this->frontController->addComment($_POST, $_GET['parameter']);
			}
			elseif ($_GET['route'] === 'rudeComment') {
				$this->frontController->rudeComment($_GET['parameter']);
			}
			elseif ($_GET['route'] === 'connection') {
				$this->frontController->connection($_POST);
			}
			elseif ($_GET['route'] === 'inscription') {
				$this->frontController->register($_POST);
			}
			elseif ($_GET['route'] === 'updateData') {
				$this->frontController->updateData($_POST);
			}
			elseif ($_GET['route'] === 'disconnection') {
				$this->frontController->disconnection();
			}
			elseif ($_GET['route'] === 'deleteCount') {
				$this->frontController->deleteCount($_SESSION['login']);
			}
			elseif ($_GET['route'] === 'administration') {
				$this->adminController->administration();
			}
			elseif($_GET['route'] === 'addEpisode'){
				$this->adminController->addEpisode($_POST);
			}
			elseif ($_GET['route'] === 'updateEpisode') {
				$this->adminController->updateEpisode($_POST, $_GET['parameter']);
			}
			elseif ($_GET['route'] === "deleteEpisode") {
				$this->adminController->deleteEpisode($_GET['parameter']);
			}
			elseif ($_GET['route'] === 'deleteComment') {
				$this->adminController->deleteComment($_GET['parameter']);
			}
			elseif ($_GET['route'] === 'deleteUser') {
				$this->adminController->deleteUser($_GET['parameter']);
			}
		}
		else {
			$this->frontController->home();
		}
	}
}
