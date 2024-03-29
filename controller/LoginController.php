<?php 

class LoginController
{
	public function login()
	{
		// $view = new View();
		// $view->load('login', 'login');
		View::load('login', 'login');
	}
	public function noscript()
	{
		View::load('login', 'noscript');
	}
	public function loginuser()
	{
		if (!isset($_POST['submit'])) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
			
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		if (empty($email) || empty($password)) {
			header('Location: ' . $_SERVER['HTTP_REFERER'] . '?err=fields can\'t be empty');
		}
		global $conn;
		$user = new Login($conn);
		$users_data = $user->checkuser($email);
		if ($users_data) {
			 $enc_password = md5($password);
			if ($enc_password === $users_data['password']) {
				$rola = $user->getRol($users_data['rol_id']);
				$_SESSION['user'] = $users_data;
				$_SESSION['rola'] = $rola;
//				// redirecting on controller which one we collect from base. And Login is first page for all users.
				header('Location: http://dnevnik/'. $_SESSION['rola']['rola_description'] .'/'. $_SESSION['rola']['rola_description'] .'page/?succ=succesfful');
			}else{
				header('Location: ' . $_SERVER['HTTP_REFERER'] . '?err=wrong credentials');
			}
		}else{
				header('Location: ' . $_SERVER['HTTP_REFERER'] . '?err=something went wrong');			
		}
	}
	/*
    * Method for logout user! just unset session[rola];
    */
    public function logout()
    {
        unset($_SESSION['rola']);
        // header('Location:http://dnevnik/login/login');
    }

}
