<?php 

class Parents
{
	private $conn = null;
	public function __construct($db)
	{
		$this->conn = $db;
	}
	public function getStudent($id_parent)
    {
        $query = 'select * from students where id_parent = :id_parent';
		$stmt = $this->conn->prepare($query);
    	$stmt->bindParam(':id_parent', $id_parent);
    	$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result) {
            return true;
        }
    }
}