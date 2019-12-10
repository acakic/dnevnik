<?php 

class Administrator
{
	protected $conn = null;
	public function __construct($db)
	{
		$this->conn = $db;
	}
	/*
     * Method for check if  that email is free to use. Check if in db dont have that one! Administrator  registration methoda
     */ 
    public function checkIfAvailable($email)
    {
    	$query = 'select * from users where email = :email';
		$stmt = $this->conn->prepare($query);
    	$stmt->bindParam(':email', $email);
    	$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		//if is not found return true (email not exists in db)
		if (!$result) {
			return true;			
		}
		return false;
    }
    /*
     * Method for saving into users table. Administrator  registration methoda
     */
    public function register($first_name, $last_name, $email, $password, $rol_id)
    {
    	$query = 'insert into users  (first_name, last_name, email, password, rol_id) values (:first_name, :last_name, :email, :password, :rol_id)';
		$stmt = $this->conn->prepare($query);
    	$stmt->bindParam(':first_name', $first_name);
    	$stmt->bindParam(':last_name', $last_name);
    	$stmt->bindParam(':email', $email);
    	$stmt->bindParam(':password', $password);
    	$stmt->bindParam(':rol_id', $rol_id);
    	if ($stmt->execute()) {
    		return true;
    	}
    	return false;
    }
    /*
     * Method for saving into student table. Administrator  registration method for students
     */
    public function userRegister($first_name, $last_name, $id_class, $id_parent, $id_grade)
    {

        $query = 'insert into students  (first_name, last_name, id_class, id_parent, id_grade) values (:first_name, :last_name, :id_class, :id_parent, :id_grade)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':id_class', $id_class);
        $stmt->bindParam(':id_parent', $id_parent);
        $stmt->bindParam(':id_grade', $id_grade);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
