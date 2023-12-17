<?php
spl_autoload_register(function ($class) {
  include '../../classes/' . $class . '.php';
});

//use Controller\Authentication;

//$auth = new Authentication();

function Dashboard(){
    global $auth;
    $output=" <li onclick='alert(1)'><a>Dashboard</a></li>";
            return $output;
        
}
function timeDisplay(){
    global $auth;
    $output=" <li><a href='Sangla'>New Sangla</a></li>";
    return $output;
        
}
function newSangla(){
    global $auth;
	$output=" <li><a href='Sangla'>New Sangla</a></li>";
    return $output;
        
}

function Patubo(){
    $output=" <li><a href='Patubo'>Patubo</a></li>";
    return $output;
}

function Redeem(){
    $output=" <li><a href='Redeem'>Redeem</a></li>";
    return $output;
}

function logout(){
    $output=" <li><a type ='button' href='Logout'>Logout</a></li>";
    return $output;
}
?>