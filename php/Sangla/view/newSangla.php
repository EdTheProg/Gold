<?php
spl_autoload_register(function ($class) {
  include '../../../classes/' . $class . '.php';
});

use Controller\Login;


echo "test1";

switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    echo "method is post";
    break;
  case 'GET':
    echo "method is GET";
    break;
  default:
    http_response_code(405);
    break;
}
  /*
  if (isset($_GET)){

     echo "tesss";
    
  }
  else{
    http_response_code(400);
  }
  */
  
?>