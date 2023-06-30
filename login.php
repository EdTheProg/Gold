<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <?php
    include 'include/head.html';
    ?>

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
            background-color: #fefefe;
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


</head>

<body class="container " style="background-color:#f0f1f2;">
    <div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 100vh;  min-width: 50vw;">
        <div class="row logCont">
            <div class="col-md-12 p-0 " style=" min-width: 50vw;">
                <form method="post" id="log-In">
                    <div class="row text-center justify-content-center">
                        <div class="col-md-6">
                            <img src="pcn.png" alt="" class="" style="max-width:200px;padding-top:10px">
                        </div>
                    </div>

                    <div id="em"></div>
                    <div class="form-group">
                        <label class="logLabels" for="user">UserName:</label><br>
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

                <h6>No Accout Yet?
                    <a href="" data-toggle="modal" data-target="#myModal">Sign Up</a>
                    here
                </h6>


            </div>
        </div>
    </div>
    <a id="promptLog" data-toggle="modal" data-target="#myModal2" hidden></a>
    <?php include 'include/signUp.html' ?>
    <?php include 'include/adminPrompt.html' ?>


    <script>
        $(document).ready(function() {

            $("#log-In").on("submit", function(event) {
                event.preventDefault(); // Prevent default form submission

                // Perform AJAX request
                $.ajax({
                    type: "POST",
                    url: "include/processLogin.php", // Replace with the actual PHP script URL
                    data: $(this).serialize(),
                    success: function(response) {

                        var responseObject;
                        try {
                            responseObject = JSON.parse(response);
                        } catch (error) {
                            console.error("Error parsing JSON: " + error);
                            return; // Stop further execution
                        }

                        var res = responseObject.res;
                        var approverRole = responseObject.approver;

                        if (res == "Match") {
                           
                            if (approverRole == 1) {
                        
                                setTimeout(function() {
                                    document.getElementById("promptLog").click();
                                }, 3000);

                            } else {
                                setTimeout(function() {
                                    window.location.href = 'index.php';
                                }, 3000);
                                
                            }

                        } else if (res == "Unmatch") {
                            document.getElementById("em").innerHTML = "Incorrect Username/Password";
                        } else {
                            document.getElementById("em").innerHTML = "Username Does Not Exist";
                        }

                    },
                });
            });
        });
    </script>
</body>


</html>