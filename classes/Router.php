<?php
class Router
{
	private $get;

	public function __construct($get){
		$this->get = $get;
	}

	public function renderController(){
		if ($this->get === 'home') {
			$home = new FrontController();
			$home->home();
		}
		elseif ($this->get === 'episode') {
			$episode = new FrontController();
			$episode->getChapter($_GET['chapter']);
		}
		else {
			echo '404';
		}
	}
}
