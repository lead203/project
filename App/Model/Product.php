<?php

	namespace App\Model;

	use App\Core\Model;

	class Product extends Model {

		public function getAll() {
			$result = $this->db->getAll();
			return $result;
		}

		public function getProduct() {
			$result = $this->db->getProduct();
			return $result;
		}
	}