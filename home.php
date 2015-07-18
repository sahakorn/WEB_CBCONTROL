<?php
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
			unset($_SESSION['access_hold']);
			 header('Location: home.php');
		}
		exit;
	}
	$node1_select = "mdl-tabs__panel is-active";
	$node2_select = "mdl-tabs__panel is-active";
	$node3_select = "mdl-tabs__panel is-active";
	if($_GET['id'] != NULL)
	{
		$info = "key=evnu2013&type=sendAccessControl&machine_id=".$_GET['id']."&hold_id=".$_SESSION['login_user']."&access=0";
		//$response = http_get("http://api.leaning.me/nbtc/api_nbtc.php", $info);
		session_start();
		$_SESSION['access_hold'] ="holding";
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
		$obj = json_decode($result);
			//var_dump($result);
			if($obj->{'code'}== "0"){
				session_start();
				$_SESSION['machine_id']=$_GET['id']; // Initializing Session
				$_SESSION['access_code']= $obj->{'code'};
				$url = "Location: control.php?node-id=".$_SESSION['machine_id'];
			     header($url);
				exit;
				
			}
			else if($obj->{'code'} == "-18")
				{
				session_start();
				$_SESSION['machine_id']=$_GET['id']; // Initializing Session
				$_SESSION['access_code']= $obj->{'code'};
				$url = "Location: control.php?node-id=".$_SESSION['machine_id'];
			     header($url);
				exit;
				}
			
	}
	
	$getMac = "http://api.leaning.me/nbtc/api_nbtc.php?key=evnu2013&type=get_machine_view";
	$getStatus = array(
		'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'GET'
			),
		);
		$getContextSt  = stream_context_create($getStatus);
		$result = file_get_contents($getMac, false, $getContextSt);
		$Obj = json_decode($result);
	for($i = 0;$i<3;$i++)
		{
			
		if($Obj->{'machine_view_list'}[$i]->{'machineid'} == "1")
			{
				
				$node_st1 = $Obj->{'machine_view_list'}[$i]->{'status'};
				if($node_st1 == "0")
				{
					$node_st1 = "Offline";
					$pic_1 = "picture/logo/cb245_busy.png";
				}
				else if($node_st1 == "1")
				{
					$node_st1 = "Online";
					$pic_1 = "picture/logo/cb245_busy.png";
					$_SESSION['en_node'] = "";
				}
				else if($node_st1 == "2")
				{
					$node_st1 = "Busy";
					$pic_1 = "picture/logo/cb245_busy.png";
					$_SESSION['en_node'] = "disabled";
					
				}
			}
			else if($Obj->{'machine_view_list'}[$i]->{'machineid'} == "2") {
				$node_st2 = $Obj->{'machine_view_list'}[$i]->{'status'};
				if($node_st2 == "0")
				{
					$node_st2 = "Offline";
					$pic_2 = "picture/logo/cb245_busy.png";
				}
				else if($node_st2 == "1")
				{
					$node_st2 = "Online";
					$pic_2 = "picture/logo/cb245_busy.png";
					$_SESSION['en_node'] = "";
				}
				else if($node_st2 == "2")
				{
					$node_st2 = "Busy";
					$pic_2 = "picture/logo/cb245_busy.png";
					$_SESSION['en_node'] = "disabled";
				}
			}
			else if($Obj->{'machine_view_list'}[$i]->{'machineid'} == "3") {
				$node_st3 = $Obj->{'machine_view_list'}[$i]->{'status'};
				if($node_st3 == "0")
				{
					$node_st3 = "Offline";
					$pic_3 = "picture/logo/cb245_busy.png";
				}
				else if($node_st3 == "1")
				{
					$node_st3 = "Online";
					$pic_3 = "picture/logo/cb245_busy.png";
					$_SESSION['en_node'] = "";
				}
				else if($node_st3 == "2")
				{
					$node_st3 = "Busy";
					$pic_3 = "picture/logo/cb245_busy.png";
					$_SESSION['en_node'] = "disabled";
				}
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
	  
      <span class="mdl-layout-title">NBTC-NU</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <button id="demo-menu-lower-right"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>
</button>

<ul  class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"for="demo-menu-lower-right">
  <li  class="mdl-menu__item">Refresh Node!</li>
  <a href = "out.php"><li class="mdl-menu__item">Logout</li></a>
</ul>
      </nav>
    </div>
	
  </header>

  <main  class="mdl-layout__content">
    <div style="padding-top:5px" class="page-content" align="center">
	<div class="demo-grid-1 mdl-grid">
  <div style ="padding-top:20px;height:75%;background-color:#FFFFFF;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);"class="mdl-cell mdl-cell--4-col">
    <img src="<? echo $pic_1;?>" width="90%" ><br><br>
	 Node 1: Faculty of Engineering<br>
	 Status : <? echo $node_st1;?> <br><br>
	 <form method ="GET">
	 <input type ="hidden" id="id" name = "id" value="1" >
	<button type ="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect mdl-button--accent" >
		Node 1 Control
	</button>
	</form>
  </div>
  <div style ="padding-top:20px;height:75%;background-color:#FFFFFF;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);"class="mdl-cell mdl-cell--4-col">
      <img src="<? echo $pic_2;?>" width="90%" ><br><br>
		 Node 2: Faculty of Engineering<br>
	 Status : <? echo $node_st2;?> <br><br>
	  <form method ="GET">
	 <input type ="hidden" id="id" name = "id" value="2" >
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect mdl-button--accent">
		Node 2 Control
	</button>
	</form>
  </div>
  <div style ="padding-top:20px;height:75%;background-color:#FFFFFF;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);"class="mdl-cell mdl-cell--4-col">
      <img src="<? echo $pic_3; ?>" width="90%"><br><br>
	  
	 Node 3: Faculty of Engineering<br>
	 Status : <? echo $node_st3;?> <br><br>
	 <form method ="GET">
	 <input type ="hidden" id="id" name = "id" value="3" >
	<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect mdl-button--accent">
		Node 3 Control
	</button>
	</form>
  </div>
</div>
		
	</div>
  </main>
<footer class="mdl-mini-footer">
  <div class="mdl-mini-footer--left-section">
    <div class="mdl-logo">Title</div>
    <ul class="mdl-mini-footer--link-list">
      <li><a href="#">Help</a></li>
      <li><a href="#">Privacy & Terms</a></li>
    </ul>
  </div>
</footer>

		

	</body>
	
</html>