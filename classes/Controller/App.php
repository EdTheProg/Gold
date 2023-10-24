<?php

namespace Controller;

spl_autoload_register(function ($class) {
    include '../' . $class . '.php';
});

//use Controller\General;

class App
{
    public $web="Payroll";
    //public $url =  "{$_SERVER['REQUEST_URI']}";

  
    public function sessionsFunction(){
        session_name("Gold");
        session_start();
        date_default_timezone_set('Asia/Manila');  
        if (isset($_GET['logout'])){
            sleep(3);
            $branch = $_SESSION['branch_id'];
            session_destroy();
            header('Location: /Gold/login/'.$branch);
        }
        if (isset($_GET['comp'])){
            //session_start();
            $newCom = $_GET['comp'];
            $_SESSION['company'] = filter_var($newCom, FILTER_SANITIZE_STRING);
            sleep(3);
            header('Location: Dashboard');  
        }
    }
    public function checkSessionForLogin()
    {
        if (isset($_SESSION['id'])) {
            header('Location: /Gold/Dashboard');
        }
    }
    public function checkSessionForPages()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: /Gold/login');
        }
    }

    
}
/*
$test= new App();
echo $test->checkCompanyAccess();
*/