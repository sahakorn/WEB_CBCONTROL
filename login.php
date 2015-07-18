<?php


	if($_POST['username'] != NULL && $_POST['password'] != NULL){
		$info = "key=evnu2013&type=sendUserLogin&username=".$_POST['username']."&password=".hash('sha256',$_POST['password'])."&salt=NBTC";
		//$response = http_get("http://api.leaning.me/nbtc/api_nbtc.php", $info);
		
		$url = 'http://api.leaning.me/nbtc/api_nbtc.php?'.$info;
		//$data = array('key' => 'evnu2013', 'type' => 'sendUserLogin' , 'username' => $_POST['username'] , 'password' => hash('sha256',$_POST['password']) , 'salt' => 'NBTC' );

		// use key 'http' even if you send the request to https://...
		$options = array(
		'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'GET'
			),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		//var_dump($result);
		$obj = json_decode($result);
			
			if($obj->{'code'}== "0"){
				session_start();
				$_SESSION['login_user']=$_POST['username']; // Initializing Session
			   header('Location: home.php');
				exit;
				
				
			}
			else{
				header('Location: login.php?Re-login');
				
			}
	}

?>


<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>
			Login to NBTC_NU
		</title>
		 <script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
		<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.teal-pink.min.css" /> 
		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>			

		<!-- Material Design icon font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="css/header-view.css">
		<link rel="stylesheet" href="css/fonts-control.css">
	</head>
	<body>
			<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">NBTC-CPE-NU</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a href="#" class="mdl-layout__tab">Register</a>
        <button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>

<ul  class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"for="demo-menu-lower-right">
  <a href = "close.php"><li class="mdl-menu__item">Close</li></a>
</ul>
     
      </nav>
    </div>
  </header>
  <main  class="mdl-layout__content">
    <div  class="page-content" align="center">
			<div style="height:0%" class="demo-grid-1 mdl-grid"></div>
		<div style="height:66%" class="demo-grid-1 mdl-grid">
		  <div class="mdl-cell mdl-cell--4-col">
		  </div>
		 
		   <div style=" padding-top:3%;background-color:rgb(255, 255, 255);box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);" class="mdl-cell mdl-cell--4-col">
		   <img src="picture/logo/Main_Logo.png" width="80%">
					<form action="login.php" method ="POST">
					<br>
						<div class="mdl-textfield mdl-js-textfield textfield-demo">
							<input class="mdl-textfield__input" type="text" id="username" name="username" />
							<label class="mdl-textfield__label" for="sample1">Username</label>
						</div><br>
						<div  class="mdl-textfield mdl-js-textfield textfield-demo">
							<input class="mdl-textfield__input" type="password" id="password" name="password"/>
							<label class="mdl-textfield__label" for="sample1">Password</label>
						</div><br>

							<button style="min-width: 300px;" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
							  Login
							</button><br><br>
							<div style="width:150px">
								<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
								  <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input"/>
								  <span class="mdl-checkbox__label">Remember me</span>
								</label>
							</div>
					</form>
				
			</div>
			
			 <div class="mdl-cell mdl-cell--4-col"></div>
		</div>
		<div style="height:10%" class="demo-grid-1 mdl-grid">
		  <div class="mdl-cell mdl-cell--4-col">
		  </div>
	<div  class="mdl-cell mdl-cell--4-col">
   <p>Credit by <a href="#">XEUS-LAB.</a> Contact him at  <a href="#">xeuslab@nu.ac.th.</a></p>
		<p>Based on Meterial Design.Web fonts from Google.</p>
		<p>Copy right © XEUS-LAB , Naresuan University.</p>
		  </div>
 <div class="mdl-cell mdl-cell--4-col">
		  </div>		  
		
		</div>
	</div>
  </main>

</div>
		

	</body>
	
</html>