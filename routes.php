<?php
function __autoload($class_name) 
{
  require_once $class_name . '.php';
}
$requestURL = $_SERVER['REQUEST_URI'];
$requestMETHOD = $_SERVER['REQUEST_METHOD'];

if ($requestURL=='/hackathon/signup'&&$requestMETHOD=="GET") {
   $controller = new user_controller;
   $controller->getsignup();
}
elseif ($requestURL=='/hackathon/signup'&&$requestMETHOD=="POST") {
   $controller = new user_controller;
   $controller->postsignup($_POST);
}
else if ($requestURL=='/hackathon/login'&&$requestMETHOD=="GET") {
   $controller = new user_controller;
   $controller->getlogin();
}
elseif ($requestURL=='/hackathon/login'&&$requestMETHOD=="POST") {
   $controller = new user_controller;
   $controller->postlogin($_POST);
}
else{
	echo 'Sorry Route Not found';
}
?>