<?php

spl_autoload_register(function ($class) {
	include '../../../classes/' . $class . '.php';
});

//session_name("Gold");
session_start();
use Controller\Login;

if (isset($_POST) && (isset($_POST['username']) AND isset($_POST['password']))){
	
	$login= new Login();
	$result= $login->AuthenticateLogin($_POST['username'],$_POST['password'],$_SESSION['branch_id']);

	echo $result;

}
else{
	echo "Denied";
}

?>