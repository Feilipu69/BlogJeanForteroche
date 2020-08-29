<?php

namespace Bihin\Forteroche\classes;

class View
{
	private $file;

	public function __construct($file){
		$this->file = $file;
	}

	public function render($params = []){
		extract($params);
		$file = $this->file;
		ob_start();
		//require_once VIEW . $file . '.php';
		require_once 'view/' . $file . '.php';
		$content = ob_get_clean();
		//require_once VIEW . 'gabarit.php';
		require_once 'view/gabarit.php';
	}
}
