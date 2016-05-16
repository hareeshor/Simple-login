<?php
class users {
	public $tableName = "users";
	public $con;
	public $username;
	public $password;
	public $email;
	
	public function __construct($db){
		$this->con = $db;
	}
	
	function registerUser()
	{
		$query = "INSERT INTO " .$this->tableName. " SET username = ?, password = ?, email = ?";		
		$stmt = $this->con->prepare($query);
		
		// posted values
		$this->username=$this->sanitizedata($this->username);
		$this->password=$this->sanitizedata($this->password);
		$this->email=$this->sanitizedata($this->email);
		
		// bind values
		$stmt->bindParam(1, $this->username);
		$stmt->bindParam(2, md5($this->password));
		$stmt->bindParam(3, $this->email);
		
		try {
			$stmt->execute();
			$rowcount = $stmt->rowCount();
			return $rowcount;
		} catch (PDOException $e) {			
			return $e->getMessage();
		}		
	}
	function sanitizedata($data)
	{
		$data = trim($data);
		$data = strip_tags($data);
		$data = htmlspecialchars($data);
		return $data;
	}	
	function getUserinfo($userName)
	{
		$query = $this->con->prepare("select * from " . $this->tableName. " where username = '".$userName."'");
		$query->execute();
		$rowcount = $query->rowCount();
		if ($rowcount == 1) {			
			return $rowcount;
		}
		else 
		{
			return $rowcount;
		}
		
	}
	function userlogin()
	{
		
		
		
	}
	
		
	
}