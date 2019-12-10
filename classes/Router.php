<?php 
// check if unsets url params  

class Router
{
	private $request;
	public $controller;
	public $method;
	public $params;
	//stoje imena controllera malim slovima bez dodatka controller
	private $allowed_controllers = array(
		'teacher',
		'administrator',
		'director',
		'parent',
		'professor',
		'login'
	);
	// kada se napravi metoda, dodati stranicu u allowed routes
	private $allowed_routes = array(
		'login',
		'noscript',
		'administratorpage',
		'newuserform',
		'newstudentform',
		'registration',
		'userRegistration',
		'scheduleform',
		'directorpage',
		'parentpage',
		'getStudent',
		'teacherpage',
		'professorpage',
		'loginuser',
		'logout',
	);
	public function __construct($request)
	{
		$this->request = $request;
		$this->getController();
		$this->getMethod();
		$this->getParams();
		//instancira objekat i dodaje mu parametre
		call_user_func_array([$this->controller, $this->method], $this->params);
	}
	private function getController()
	{
		if (isset($_SESSION['rola'])) {
			if (!in_array($_SESSION['rola']['rola_description'], $this->allowed_controllers)) {
				$controller_slug = 'login';
				return;
			}
			$controller_slug = $_SESSION['rola']['rola_description'];
		}else{
			$controller_slug = 'login';
		}
		//ovde proveravamo da li se nalazi u tom nizu
		return $this->controller = $this->instantiateController($controller_slug);
	}
	private function instantiateController($controller_slug)
	{
		//setting the name for the controller, ovde dodajemo taj dodatak
		$controller_name = ucfirst($controller_slug) . 'Controller';
		require_once('./controller/' . $controller_name .'.php');
		return new $controller_name($this->request);
	}
	private function getMethod()
	{
		// if is set method in url check if that method exists or show 404 page
		// if is not set show login page 
		if (isset($this->request->url_parts[1])) {
			$method = $this->request->url_parts[1];
			if (!method_exists($this->controller, $method)) {
				$this->show404();
			}else if(!in_array($method, $this->allowed_routes)){
				$this->show404();
			}else{
				// unset($this->request->url_parts[1]);
				$this->method = $method;
			}
		}else{
			$this->method = 'login';
		}
	}
	private function getParams()
	{
		$this->params = (isset($this->request->url_parts[3])) ? $this->request->url_parts[3] : array(); 
	}
	private function show404()
	{
		View::load('login', '404');
	}
}

