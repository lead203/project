<?php

	namespace App\Core;

	class View {

		public $path;
		public $route;
		public $layout = 'default';

		public function __construct($route) {
			$this->route = $route;
			$this->path = $route['controller'].'/'.$route['action'];
		}

		public function render($title, $vars = []) {
			extract($vars);
			$path = 'App/View/'.$this->path.'.php';
			if (file_exists($path)) {
				ob_start();
				require $path;
				$content = ob_get_clean();

				require 'App/View/layouts/'.$this->layout.'.php';
			} else {
				echo "View not found";
			}
		}

		public function redirect($url) {
			header('Location: '.$url);
			exit;
		}

		public static function errorCode($code) {
			http_response_code($code);
			require 'App/View/errors/'.$code.'.php';
			exit;
		}
	}