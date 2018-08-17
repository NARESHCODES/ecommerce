<?php

namespace Lib\Core;

class Database {
		public $_db;

		public function __construct(){
		$this->_db = new \PDO('mysql:host=' . _DATABASE_HOST . ';dbname=' . _DATABASE_NAME, _DATABASE_USER, _DATABASE_PASSWORD);
		}
}