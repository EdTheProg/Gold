<?php

namespace Controller;

spl_autoload_register(function ($class) {
    include '../' . $class . '.php';
});

//use Controller\General;
use Model\StoreDetails;

class App
{
    public $web="GOLD";
    public $storeName ;
    

    //public $url =  "{$_SERVER['REQUEST_URI']}";

  
    public function sessionsFunction(){
        //session_destroy();
        session_name("GOLD");
        session_start();
        date_default_timezone_set('Asia/Manila');  
        $this->fetchbranchDetails($_SESSION['branch']);
        
        if (isset($_GET['logout'])){
            $branch = $_SESSION['branch'];
            sleep(3);
            session_destroy();
            header('Location: /FMF/GOLD/login/'.$branch);
        }

    }

    public function checkSessionForLogin()
    {
        if (isset($_SESSION['current_user_id'])) {
            header('Location: /FMF/GOLD/Dashboard');
        }
        else{
            unset($_SESSION['branch']);
            $_SESSION['branch']=$_GET['branch'];
        }
    }
    public function checkSessionForPages()
    {
        if (!isset($_SESSION['current_user_id'])) {
            $branch = $_SESSION['branch'];
            header('Location: /FMF/GOLD/login/'.$branch);
        }
    }

    public function fetchbranchDetails($storeCode){

        if (preg_match('/^([A-Z]+)(\d+)$/', $storeCode, $matches)) {
            $letters = $matches[1]; // Contains "BUL"
            $numbers = $matches[2]; // Contains "0001"
            
        }
        $store = new StoreDetails($letters,$numbers);
        $this->storeName = $store->storeName;
        //$_SESSION['personnels'] = $store->storePersonnels;
    }

    
}
/*
$test= new App();
echo $test->checkCompanyAccess();
*/