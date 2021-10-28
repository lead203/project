<?php

	namespace App\lib;

	use PDO;

	class Db {
		private $title;
		private $description;
		private $price;
		protected $db;

		public function __construct() {
			$config = require 'App/config/Db.php';
			$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'], $config['user'], $config['password']);
			$_SESSION['number_page'] = 1;
			$_SESSION['position'] = 1;
		}

		public function query($sql, $params = []) {
			$stmt = $this->db->prepare($sql);
			if(!empty($params)) {
				foreach ($params as $key => $value) {
					$stmt->bindValue(':'.$key, $value);
				}
			}

			$stmt->execute();
			return $stmt;
		}

		public function row($sql, $params = []) {
			$result = $this->query($sql, $params);
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}

		public function column($sql, $params = []) {
			$result = $this->query($sql, $params);
			return $result->fetchColumn();
		}

		public function count($sql, $params = []) {
			$result = $this->query($sql, $params);
			return $result->rowCount();
		}

	}