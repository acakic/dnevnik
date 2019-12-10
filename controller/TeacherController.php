<?php 

class TeacherController
{
	private $err = 'Something went wrong, please try again';
	
	public function teacherpage()
	{
		View::load('teacher', 'teacherpage');
	}
    public function logout()
    {
        unset($_SESSION['rola']);
        header('Location:http://dnevnik/login/login');
    }
}