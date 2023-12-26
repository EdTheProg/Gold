<?php
session_name("GOLD");
session_start();

if($_POST['transactionType']==1){
	$_SESSION['time_on']=true;
}
else{
	$_SESSION['time_on']=false;
}

sleep(3);

?>