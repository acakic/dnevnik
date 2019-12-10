<?php

class ParentController
{
	private $err = 'Something went wrong, please try again';
	
	public function parentpage()
	{
        global $conn;
        $student = new Parents($conn);
        $_SESSION['student'] = $student->getStudent($_SESSION['user']['id_user']);
        View::load('parent', 'parentpage');
	}
    public function logout()
    {
        unset($_SESSION['rola']);
        header('Location:http://dnevnik/login/login');
    }
}