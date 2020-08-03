<?php
class Router
{
	private $get;

	public function __construct($get){
		$this->get = $get;
	}

	public function renderController(){
		if ($this->get === 'home') {
			$home = new Home();
			$home->home();
		}
		else {
			echo '404';
		}
	}
}
