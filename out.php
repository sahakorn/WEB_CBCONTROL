<?php 
    // First we execute our common code to connection to the database and start the session 
     session_start();
	 if(isset($_SESSION['access_hold']))
	{
	$getMac1 = "http://api.leaning.me/nbtc/api_nbtc.php?key=evnu2013&type=clearState&machine_id=".$_SESSION['machine_id']."&hold_id=".$_SESSION['login_user'];
	$getStatus1 = array(
		'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'GET'
			),
		);
		$getContextSt1  = stream_context_create($getStatus1);
		$result1 = file_get_contents($getMac1, false, $getContextSt1);
		$Obj1 = json_decode($result1);
		if($Obj1->{'code'} == "0"){
			 unset($_SESSION['login_user']); 
			unset($_SESSION['access_hold']); 
			unset($_SESSION['machine_id']); 
			header("Location: login.php"); 
				exit();
			die("Redirecting to: login.php");
		}
		exit;
	}
	else {
		 unset($_SESSION['login_user']); 
	unset($_SESSION['access_hold']); 
	unset($_SESSION['machine_id']); 
    header("Location: login.php"); 
	exit();
    die("Redirecting to: login.php");
	}
    // We remove the user's data from the session 
   
?>