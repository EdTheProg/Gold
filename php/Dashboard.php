<?php
    spl_autoload_register(function ($class) {
        include '../classes/' . $class . '.php';
    });

$app= new Controller\App();

$app->sessionsFunction();
$app->checkSessionForPages();

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet"  type="text/css" href="assets/css/bootstrap.min.css">
   <script type="text/javascript" src="assets/js/bootstrap.min.js" defer></script>
   <!--<script src="https://code.jquery.com/jquery-3.6.4.min.js" defer></script> -->
   <script src="assets/jquery.js" ></script>
   
   <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
   <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
   <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Gold</title>


   </head>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #eaeaea;

        }

        ul {
            list-style-type: none;
        }

        ul li {
            text-align: center;
            font-family: verdana, sans-serif;
            margin-top: 20px;
            padding: 12px;
            border-radius: 10px;
            background-color: #ad974f;
        }

        ul li:hover {
            background-color: #8e793e;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

       

        .sidebar {
            background-color: #231f20;
        }

        .centerme {
            position: fixed;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>


<body>
   <?php include 'templates/sidebar.php' ?>
    <div id="content" class="active">
    <?php 
        $type= $_GET['type'];

        switch ($type){
            case "Sangla":
                include 'Sangla/sangla.html';
            break;
            case "Patubo":
                include 'Patubo/patubo.html';
                break;
            case "Redeem":
                include 'Redeem/redeem.html';
                break;
            case "Dashboard":
                include 'Dashboard/dashboard.html';
                break;
            default:
                break;
        }
        

    ?>


  </div>
  </div>
 

</div>

</body>

</html>