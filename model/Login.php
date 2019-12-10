<?php 

class Login
{
	protected $conn = null;
	public function __construct($db)
	{
		$this->conn = $db;
	}
	public function checkuser($email)
	{
		$query = 'select * from users where email = :email';
		$stmt = $this->conn->prepare($query);
    	$stmt->bindParam(':email', $email);
    	$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result) {
			return $result;
		}
		return false;
	}
	public function getRol($roll_id)
	{
		$query = 'select * from rola where id_rola = :rol_id';
		$stmt = $this->conn-> prepare($query);
		$stmt->bindParam(':rol_id', $roll_id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result) {
			return $result;
		}
		return false;
	}
}
