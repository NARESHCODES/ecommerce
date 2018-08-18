<?php

namespace Lib\Core;

class Database {
		protected $table;
		protected $_connection;

		public function __construct(){
		$this->_connection = new \PDO('mysql:host=' . _DATABASE_HOST . ';dbname=' . _DATABASE_NAME, _DATABASE_USER, _DATABASE_PASSWORD);
		$this->_connection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
	}

public function all(){
	$statement=$this->_connection->prepare("SELECT * FROM $this->table");
	$statement->execute();
	return $statement->fetchAll(\PDO::FETCH_ASSOC);
}


}
