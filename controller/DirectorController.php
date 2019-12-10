<?php 

class DirectorController
{
	private $err = 'Something went wrong, please try again';
	public function directorpage()
	{
		View::load('director', 'directorpage');
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