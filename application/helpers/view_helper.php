<?php

use Jenssegers\Blade\Blade;

//use Twig\Loader\FilesystemLoader;
//use Twig\Environment;


if(!function_exists('view')){
	
	// BLADE
	function view($view, $data = []){
		$path = APPPATH.'views';
		$blade = new Blade($path, $path . '/cache');

		echo $blade->make($view, $data);
	}

	// TWIG
	// function view($view){
	// 	$path = APPPATH . 'views';
	// 	$loader = new FilesystemLoader($path);
	// 	$twig = new Environment($loader, [
	// 		'cache' => $path . '/cache'
	// 	]);
	// 	$template = $twig->load($view . ".twig");
	// 	return $template;
	// }
}