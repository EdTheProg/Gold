<?php

namespace Controller;

spl_autoload_register(function ($class) {
    include '../' . $class . '.php';
});

use Middleware\Encrypt;

class Login
{   

    public $enc;

    public function __construct(){
        $this->enc= new Encrypt();
    }
    public function AuthenticateLogin($user,$pass,$branch){

        $pass= $this->enc->password_encrypt($pass);

        $result = "Granted";

        if($result =="Granted"){
            $this->resultGranted();
        }
        else{
            
        }
        return $result;
    }

    public function resultGranted(){
        $_SESSION['id']='1';
    }
    
}



/*
$test= new App();
echo $test->checkCompanyAccess();
*/