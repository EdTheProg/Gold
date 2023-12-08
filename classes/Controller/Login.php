<?php

namespace Controller;

spl_autoload_register(function ($class) {
    include '../' . $class . '.php';
});

use Model\UserVerification;
use Middleware\Encrypt;

session_name("GOLD");
session_start();
class Login extends UserVerification
{   

    public $model;

    public function __construct(){
        $this->model= new UserVerification();
    }
    public function AuthenticateLogin($user,$pass){
         if (preg_match('/^([A-Z]+)(\d+)$/', $_SESSION['branch'], $matches)) {
            $letters = $matches[1]; // Contains "BUL"
            $numbers = $matches[2]; // Contains "0001"
            
        }

        //echo $letters."<>".$numbers;

        $user = $this->model->searchUser($user,$letters,$numbers);

        if(!empty($user)){
            if (password_verify($pass,$user[0]['password'])) {
                $this->resultGranted($user);
            }
            else{
                http_response_code(401);     
            }
        }
        else{
            http_response_code(401);
        }
       
    }

    public function resultGranted($user){
        $_SESSION['current_user_id']=$user[0]['id'];
        $_SESSION['current_user_name']=$user[0]['first_name'];
    }
    
}



/*
$test= new App();
echo $test->checkCompanyAccess();
*/