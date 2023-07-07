<!DOCTYPE html>
<html>

<head>
    <?php
            include 'include/head.html';
        ?>
    <style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color:#eaeaea;
    }
    ul{
        list-style-type: none;
    }
    ul li{
        text-align:center;
        font-family:verdana,sans-serif;
        margin-top:20px;
        padding: 20px;
        border-radius:10px;
        background-color:#ad974f;
    }
    ul li:hover{
        background-color:#8e793e;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    .logout{
        margin-top:auto  !important;
    }
    .sidebar{
        background-color:#231f20;
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

<body onload="setDefaultDate()">
    
    <div class="container-fluid h-100" style="min-height:100%">
        <div class="row" style="min-height:100%">
            <div class="col-sm-2 sidebar" >
                <img src="logo.png" alt="" class="" style="max-width:200px;">
                
                    <ul>
                        <li onclick="alert('sangla')"><a>New Sangla</a></li>
                        <li onclick="alert('patubo')"><a >Patubo</a></li>
                        <li onclick="alert('redeem')"><a >Redeem</a></li>
                    </ul>
                    <div class="logout">
                    <ul>
                        <li><a>Log-out</a></li>
                        <a id="promptRes" data-toggle="modal" data-target="#loadModal" >111</a>
                    </ul>
                    </div>
            </div>
            <div class="col-sm-10">
            
                <?php include 'newSangla.html'?>
            </div>
        </div>
    </div>



    <?php include 'include/loadermodal.html'?>
</body>

</html>