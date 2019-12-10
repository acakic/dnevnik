<?php
// pitati mentora da li je ovo pametno
// $base = global $db;		

class ParentController
{
	private $err = 'Something went wrong, please try again';
	
	public function parentpage()
	{
		View::load('parent', 'parentpage');
	}
    public function logout()
    {
        unset($_SESSION['rola']);
        header('Location:http://dnevnik/login/login');
    }


    public function getStudents()
    {
        global $conn;
        $student = new Parents($conn);
        $if_exists = $student->getStudent($parent_id);
        {
            var_dump($if_exists);
        }
    }

}