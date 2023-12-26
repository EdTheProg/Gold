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
    $output= "<h6 class='time' id='time'></h6>";
    return $output;
        
}
function transactionTypeToggler(){
    global $auth;

    if($_SESSION['time_on']){
        $output= "<li onclick = 'transactionType(0)' class = 'btn btn-danger'><a  id='timeTogler'>Time Off</a></li>";
    }
    else{
        $output= "<li onclick = 'transactionType(1)'  class = 'btn btn-success'><a  id='timeTogler'>Time On</a></li>";
    }
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