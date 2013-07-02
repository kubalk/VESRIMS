<?php

class VistaDB
{
	private $conn = null;
	private $dsn = 'mysql:host=localhost;dbname=mydb';
	private $user = 'root';
	private $password = 'PrknBys8Hl';

	function __construct()
	{
		$this->conn = new PDO($this->dsn, $this->user, $this->password);
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function getConnection()
	{
		return $this->conn;
	}
}
?>
