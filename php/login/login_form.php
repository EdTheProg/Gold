<?php
spl_autoload_register(function ($class) {
  include '../../classes/' . $class . '.php';
});

$app= new Controller\App();

$app->sessionsFunction();
$app->checkSessionForLogin();



//if(!isset($_SESSION['branch'])){ // safeguard if login form is loaded
    //$_SESSION['branch']=$_GET['branch'];
//}

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <script type="text/javascript" src="../assets/js/bootstrap.min.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" defers></script> 
  <!--<script src="../assets/additional_js/jquery.js" defer></script>-->


  <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="../assets/fontawesome/css/brands.css" rel="stylesheet">
  <link href="../assets/fontawesome/css/solid.css" rel="stylesheet">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<title><?php echo $app->web;?> | Log-In</title>
</head>
<style>
        button {
            text-transform: uppercase;
            background-color: rgb(96, 96, 232);
            /*   letter-spacing: -0.025em; */
            padding: 18px 40px;
            border-radius: 3px;
            font-weight: 500;
            font-size: 13px;
            border: none;
            color: #fff;
            cursor: pointer;
            transition: all 240ms ease;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        button:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            background-color: rgb(86, 86, 232);
            transform: translateY(6px);
        }

        button:focus {
            outline: none;
            /* Because, Chrome, WTF*/
        }

        .logInputs {
            width: 70%;
            padding: 12px 20px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 15px;
            box-sizing: border-box;
            font-size: 20px;

        }

        .signInputs {
            width: 70%;
            padding: 5px 10px;
            margin: 5px 0;
            display: inline-block;

            border-radius: 15px;
            box-sizing: border-box;
            font-size: 20px;

        }

        .logLabels {
            font-family: 'Courier New', Courier, monospace;
            font-size: 22px;

        }

        .signLabels {
            font-family: 'Courier New', Courier, monospace;
            font-size: 22px;

        }

        .logCont {
            background-color: #fffbff;
            border-radius: 1em;
            padding: 5px;
            box-shadow: 5px 10px 8px #888888;
        }

        .centerme {

            position: fixed;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>

	<body class="container " style="background-color:#c5ab55;">
        <script type="text/javascript">
            //alert(<?php echo $_GET['branch']?>);
        </script>
    <div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 100vh;  min-width: 50vw;">
        <div class="row logCont">
            <div class="col-md-12 p-0 " style=" min-width: 30vw;">
            
                <form method="post" id="log-In">
                    <div class="row text-center justify-content-center">
                        <div class="col-md-6">
                            <img src="../assets/logo/logo.png" alt="" class="" style="max-width:200px;">
                            <h4>GOLD SYSTEM</h4>
                            <small><h5><b>Branch:</b><?php echo $app->storeName ?></h5></small>
                            
                        </div>
                    </div>

                    <div id="em"></div>
                    <div class="form-group">
                        <label class="logLabels" for="user">UserId:</label><br>
                        <div class="text-center">
                            <input class="logInputs" type="text" id="user" name="user" placeholder="Enter username" required><br>
                        </div>
                        <label class="logLabels" for="pw">Password:</label><br>
                        <div class="text-center">
                            <input class="logInputs" type="password" id="pw" name="pw" placeholder="Password" required><br>
                        </div>


                    </div>

                    <div class="row text-center justify-content-center">
                        <div class="col-md-6">
                            <button type="submit" value="Submit" class="btn-lg">Log In</button>
                        </div>
                    </div>

                </form>

          


            </div>
        </div>
    </div>
    <a id="promptLog" data-toggle="modal" data-target="#myModal2" hidden></a>



    <script>

        $(document).ready(function() {

            $("#log-In").on("submit", function(event) {
                
                event.preventDefault(); // Prevent default form submission
                var username = document.getElementById('user').value;
                var pw = document.getElementById('pw').value;
                
                

                // Perform AJAX request
                
                $.ajax({
                    type: "POST",
                    url: "../php/login/view/authenticateLogin.php", // Replace with the actual PHP script URL
                    data: {
                        username : username,
                        pass: pw,
                    },
                    dataType: 'json',
                    xhr:function (){                       
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            
                            if (xhr.readyState === 4) {

                                
                                //alert(xhr.status);
                                //console.log(xhr.responseText);

                                if (xhr.status !== 200){
                                    
                                    if(xhr.status !== 401){
                                        //error function to be executed here
                                    }   
                                    else{
                                        alert('Wrong Username/Password');
                                    }
                                }
                                else{
                                    //alert(xhr.status);
                                    window.location.href = "../Dashboard";
                                }
                               
                            }
                        };
                         
                        return xhr;
                        
                    },
                    
                });
            });
        });
    </script>
</body>


</html>