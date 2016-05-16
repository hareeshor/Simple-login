<?php 
class database {	
	public $con;
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $db_name = "hareesh";
	//connect to database
	function connect()
	{
		try {
			$this->con = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->password);
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
			return $this->con;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
}

?>