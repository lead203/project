<?php
	
	namespace App\Core;

	use App\Core\View;

	class Router {

		protected $routes = [];
		protected $params = [];
		
		function __construct() {
			$arr = require 'App/config/routes.php';

			foreach ($arr as $key => $value) {
				$this->add($key, $value);
			}
		}

		public function add($route, $params) {
			$route = '#^'.$route.'$#';
			$this->routes[$route] = $params;
		}

		public function match() {
			$url = trim($_SERVER['REQUEST_URI'], '/');

			$url = explode("?", $url);
			
			foreach ($this->routes as $route => $params) {
				if(preg_match($route, $url[0], $matches)) {
					$this->params = $params;
					return true;
				}
			}

			return false;
		}

		public function run() {
			if($this->match()) {
				$path = 'App\Controller\\'.ucfirst($this->params['controller']).'Controller';
				
				if (class_exists($path)) {
					$action = $this->params['action'].'Action';
					if (method_exists($path, $action)) {
						$controller = new $path($this->params);
						$controller->$action();
					} else {
						View::errorCode(404);
					}
				} else {
					View::errorCode(404);
				}
			} else {
				View::errorCode(404);
			}
		}
	}