<?php

	namespace App\Controller;

	use App\Core\Controller;

	class MainController extends Controller {
		public function indexAction() {
			$result = $this->model->getProduct();
			$vars = $result;
			$this->view->render('Main page', $vars);
		}
	}