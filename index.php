<?php 
session_start();

foreach (glob('./classes/*') as $class_name) {
	require_once($class_name);
}
foreach (glob('./model/*') as $model_name) {
	require_once($model_name);
}
foreach (glob('./controller/*') as $controller_name) {
	require_once($controller_name);
}
require_once('./Database.php');
// instanciranje klase Database
$database = new Database();
// povezivanje sa bazom
$conn = $database->connect();

$request = new Request();
$router = new Router($request);
