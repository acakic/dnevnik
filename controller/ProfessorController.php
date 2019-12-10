<?php 

class ProfessorController
{
	private $err = 'Something went wrong, please try again';
	
	public function professorpage()
	{
		View::load('professor', 'professorpage');
	}

	/*
	 * Method for logout user! just unset session[rola];
     */
    public function logout()
    {
        unset($_SESSION['rola']);
        header('Location:http://dnevnik/login/login');
    }

}