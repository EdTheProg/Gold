<?php
spl_autoload_register(function ($class) {
  include '../../../classes/' . $class . '.php';
});

use Controller\Login;


  
  if (isset($_POST['username']) && isset($_POST['pass']) ){

      try{
        $login = new Login();
        $login->AuthenticateLogin($_POST['username'],$_POST['pass']);
        sleep(3);

      }
      catch (\Error $e){
        http_response_code(500);
          //echo $e;
      }
    
  }
  else{
    http_response_code(400);
  }
  
?>