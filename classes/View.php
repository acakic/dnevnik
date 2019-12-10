<?php 

class View
{
	//ako hoces poostavi da bude static ladi lakseg pozivanja
	public $data = array();
	public static function load(string $folder, string $file)
	{
		require_once('./view/inc/header.php');
		require_once('./view/' . $folder . '/' . $file . '.php');
		require_once('./view/inc/footer.php');
	} 
}