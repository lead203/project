<?php

	namespace App\Controller;

	use App\Core\Controller;

	class ProductController extends Controller {
		public function catalogAction() {
			$result = $this->model->getAll();
			$vars = [
				'catalog' => $result
			];
			$this->view->render('Catalog', $vars);
		}

		public function productAction() {
			$result = $this->model->getProduct();
			$vars = [
				'product' => $result
			];
			$this->view->render('Some product', $vars);
		}
		
	}