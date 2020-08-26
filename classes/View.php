<?php
/*
namespace Bihin\Forteroche\classes;
*/

class View
{
	private $template;

	public function __construct($template){
		$this->template = $template;
	}

	public function render($params = []){
		extract($params);
		$template = $this->template;
		ob_start();
		require_once VIEW . $template . '.php';
		$content = ob_get_clean();
		require_once VIEW . 'gabarit.php';
	}
}
