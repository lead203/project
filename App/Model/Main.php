<?php

	namespace App\Model;

	use App\Core\Model;

	class Main extends Model
	{
		
		public function getProduct()
		{
			$position = 0;
			$number_page = 1;
			$lim = 9;

			$query = "SELECT id FROM products";
			$count = $this->db->count($query);
			$count = ceil($count / 9);

			if (isset($_GET['next'])) {
				if ($_GET['next'] < $count) {
					$curent_page = $_GET['next'];
					$_SESSION['number_page'] = $curent_page;
					$_SESSION['position'] = $curent_page;
					$position = $_SESSION['position'] * 9 - 9;
				} else {
					$_SESSION['position'] = $count;
					$_SESSION['number_page'] = $count;
					$position = $count * 9 - 9;
				}
			} else if(isset($_GET['prev'])){
				if ($_GET['prev'] > 0) {
					$curent_page = $_GET['prev'];
					$_SESSION['number_page'] = $curent_page;
					$_SESSION['position'] = $curent_page;
					$position = $_SESSION['position'] * 9 - 9;
				} 
				
			}

			if (!empty($_POST['title']) || !empty($_POST['price'])) {
				$form = $_POST;
				$params = [];
				$str = '';
				

				foreach ($form as $key => $value) {
					if ($value !== '') {
						$params[$key] = $value;
						$str .= ' ' . $key . ' = ' . ':' . $key . ' AND';
					}
				}

				$str = substr($str, 0, -4);

				$query = "SELECT * FROM products WHERE $str LIMIT $position, $lim";
				$result = $this->db->row($query, $params);
			} else {
				$query = "SELECT * FROM products LIMIT $position, $lim";
				$result = $this->db->row($query);
			}

			return $result;
		}
	}