<?php
/*
namespace Bihin\Forteroche\utils;
*/

class MyAutoload
{
	public static function start(){
		spl_autoload_register([__CLASS__, 'autoload']);

		$host = $_SERVER['HTTP_HOST'];
		$root = $_SERVER['DOCUMENT_ROOT'];

		define('HOST', 'http://' . $host . '/blog/');
		define('ROOT', $root . '/blog/');

		define('CONTROLLER', ROOT . 'controller/');
		define('MODEL', ROOT . 'model/');
		define('VIEW', ROOT . 'view/');
		define('CLASSES', ROOT . 'classes/');
	}

	public static function autoload($class)
	{
		if (file_exists(MODEL . $class . '.php')) {
			require_once MODEL . $class . '.php';
		}
		elseif (file_exists(CLASSES . $class . '.php')) {
			require_once CLASSES . $class . '.php';
		}
		elseif (file_exists(CONTROLLER . $class . '.php')) {
			require_once CONTROLLER . $class . '.php';
		}

		/*
		$class = str_replace('Bihin\Forteroche\\', '', $class);
		$class = str_replace('\\', '/', $class);
		require $class . '.php';
		*/
	}
}
