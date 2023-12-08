<?php

namespace Middleware;

spl_autoload_register(function ($class) {
    include '../' . $class . '.php';
});

//use Controller\General;

class Encrypt
{
    
    public function password_encrypt($variable){
        $hashValue = password_hash($variable, PASSWORD_BCRYPT);
        return $hashValue;
    }
    
}

//$test= new Encrypt();
//echo $test->password_encrypt('1');
