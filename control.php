<?php
	session_start();


		if($_GET['id'] != NULL)
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
	
		$info = "key=evnu2013&type=sendAccessControl&machine_id=".$_GET['id']."&hold_id=".$_SESSION['login_user']."&access=0";
		//$response = http_get("http://api.leaning.me/nbtc/api_nbtc.php", $info);
		$_SESSION['access_hold'] = "change";
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
	
	
	if($_SESSION['machine_id'] == "1")
	{
		$node1_select = "mdl-tabs__panel is-active";
		$node2_select = "mdl-tabs__panel";
		$node3_select = "mdl-tabs__panel";
		$tab1_select = "mdl-tabs__tab is-active";
		$tab2_select = "mdl-tabs__tab";
		$tab3_select = "mdl-tabs__tab";
		$stream = "http://www.youtube.com/embed/mT-w5tLTXR4?autoplay=1";
	}
	else if($_SESSION['machine_id'] == "2")
	{
		$node1_select = "mdl-tabs__panel";
		$node2_select = "mdl-tabs__panel is-active";
		$node3_select = "mdl-tabs__panel";
		$tab1_select = "mdl-tabs__tab ";
		$tab2_select = "mdl-tabs__tab is-active";
		$tab3_select = "mdl-tabs__tab";
		$stream = "http://www.youtube.com/embed/MD_jL035Fa0?autoplay=1";
	}
	else if($_SESSION['machine_id'] == "3")
	{
		$node1_select = "mdl-tabs__panel";
		$node2_select = "mdl-tabs__panel";
		$node3_select = "mdl-tabs__panel is-active";
		$tab1_select = "mdl-tabs__tab";
		$tab2_select = "mdl-tabs__tab";
		$tab3_select = "mdl-tabs__tab is-active";
		$stream = "http://www.youtube.com/embed/O2DiKOthFpg?autoplay=1";
	}

	$getUrl = "http://api.leaning.me/nbtc/api_nbtc.php?key=evnu2013&type=get_storage_data&machine_id=".$_SESSION['machine_id'];
	$getOption = array(
		'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'GET'
			),
		);
		$getContext  = stream_context_create($getOption);
		$getResult = file_get_contents($getUrl, false, $getContext);
		$getObj = json_decode($getResult);
		$tempCh = $getObj->{'storage_data_list'}->{'channel'};
		$tempVol = $getObj->{'storage_data_list'}->{'volume'};
		
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
					
				}
				else if($node_st1 == "2")
				{
					$node_st1 = "Busy";
					$pic_1 = "picture/logo/cb245_busy.png";
					
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
					
				}
				else if($node_st2 == "2")
				{
					$node_st2 = "Busy";
					$pic_2 = "picture/logo/cb245_busy.png";
					
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
					
				}
				else if($node_st3 == "2")
				{
					$node_st3 = "Busy";
					$pic_3 = "picture/logo/cb245_busy.png";
					
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
		  <div class="mdl-cell mdl-cell--8-col">
		  <div class="mdl-card mdl-shadow--2dp demo-card-square">
		  <div id="Show_Video" style="height:100%;width:100%;background-color:#000000;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);">
		 <iframe width="100%" height="100%" src="<?=$stream;?>" frameborder="0" allowfullscreen></iframe>
		  </div>
		  
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<script src="js/jwplayer.js"></script>
        <script src="js/ripples.min.js"></script>
        <script src="js/material.min.js"></script>
		<script src="js/snackbar.min.js"></script>
        <script src="noUiSlider/jquery.nouislider.all.min.js"></script>
		
		   <script>
			/*
            $(document).ready(function() {
                $.material.init();
				
				jwplayer('Show_Video').setup({
					file: '<?=$stream;?>',
				   image: '//www.longtailvideo.com/content/images/jw-player/lWMJeVvV-876.jpg',
					title: 'PLAY',
					width: '1020px',
					height: '100%',
					aspectratio: '16:9',
					mute: 'false',
					autostart: 'true',
					repeat: 'true'
				});
				$("#shor").noUiSlider({
                    orientation: "vertical",
                    start: 40,
                    connect: "lower",
                    range: {
                        min: 0,
                        max: 100
                    }
                });
            });*/
        </script>
		  </div>
		</div>
		  <div class="mdl-cell mdl-cell--4-col">
		  <div style="height:70%;width:100%;background-color:#FFFFFF;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);">
		   <div style="height:45%;width:80%;">
		   <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <div class="mdl-tabs__tab-bar">
      <a href="#starks-panel" class="<?php echo $tab1_select;?>">Node 1</a>
      <a href="#lannisters-panel" class="<?php echo $tab2_select;?>">Node 2</a>
      <a href="#targaryens-panel" class="<?php echo $tab3_select;?>">Node 3</a>
  </div>

  <div class="<?php echo $node1_select;?>" id="starks-panel"><br>
  <img src="<? echo $pic_1;?>" width="65%" height="40%"><br>
  <form method ="GET">
	 <input type ="hidden" id="id" name = "id" value="1" >
	<button class="mdl-button mdl-js-button mdl-js-ripple-effect">
		Node 1 : <? echo $node_st1 ?>
	</button> 
	 </form>
  </div>
  <div class="<?php echo $node2_select;?>"  id="lannisters-panel"><br>
     <img src="<? echo $pic_2;?>" width="65%" height="40%"><br>
	 <form method ="GET">
	 <input type ="hidden" id="id" name = "id" value="2" >
	 <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
			Node 2 : <? echo $node_st2 ?>
		</button> 
		</form>
  </div>
  <div class="<?php echo $node3_select;?>" id="targaryens-panel"><br>
    <img src="<? echo $pic_3;?>" width="65%" height="40%"><br>
		<form method ="GET">
	 <input type ="hidden" id="id" name = "id" value="3" >
		<button class="mdl-button mdl-js-button mdl-js-ripple-effect">
			Node 3 : <? echo $node_st3 ?>
		</button> 
		</form>
  </div>
</div>
		   </div>
		  <div style="height:20%;width:80%;background-color:#FFFFFF;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);">
			Channel
			<div style="width:100%;">
			<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		<div class="mdl-tabs__tab-bar">

					<button style="min-width: 100px;min-height:45px" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect"  onclick = "increase()">Up</button>
				<form action="#">
			  <div style="width:100%;" class="mdl-textfield mdl-js-textfield textfield-demo">
				<input style="width:50%;text-align:center;"class="mdl-textfield__input" type="text" id="ch" name="ch"  value="<? echo $tempCh;?>"/>
				<input type = "hidden" id="node" name="node"  value="<? echo $_SESSION['machine_id'];?>">
				<label class="mdl-textfield__label" for="sample1"></label>
			  </div>
			</form>

				<button style="min-width: 100px;min-height:45px" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect"  onclick = "decrease()" >Down</button>
	</div>
	</div>
</div>
			
			</div>
			  <div style="height:20%;width:80%;background-color:#FAFAFA;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);">
			  Volume
				<div style="width:50%;>
					<form action="#">
			  <div style="width:50%;" class="mdl-textfield mdl-js-textfield textfield-demo">
				<input style="width:50%;text-align:center;"class="mdl-textfield__input" type="text" id="v" min ="1" max="80" name = "v" value ="<? echo $tempVol;?>" disabled />
				<label class="mdl-textfield__label" for="sample1"></label>
				
			</div>
			</div>
			
				<input class="mdl-slider mdl-js-slider mdl-slider--colored" id="vol" name ="vol" type="range" min="0" max="9" value="<? echo $tempVol;?>" tabindex="0"  onchange ="changeText()"/>
				<script>
				function changeText()
				{
					document.getElementById("v").value = document.getElementById("vol").value
				}
				function increase()
				{
						var ch = parseInt(document.getElementById("ch").value);
					if(ch %1 != 0)
						{
							document.getElementById("ch").value = <? echo "20"; ?>;
						}
						if(!(ch>0 && ch<=80))
							{
							document.getElementById("ch").value = <? echo "20"; ?>;
							}
					
					if(ch >=1 && ch<80)
					{
						document.getElementById("ch").value =parseInt(document.getElementById("ch").value)+1;
					}
				}
				function decrease()
				{
				
					var ch = parseInt(document.getElementById("ch").value);
					if(ch %1 != 0)
						{
							document.getElementById("ch").value =  <? echo $tempCh;?>;
						}
						if(!(ch>0 && ch<=80))
							{
							document.getElementById("ch").value = <? echo $tempCh;?>;
							}
					
				   if(ch >1 && ch<80)
					{
						document.getElementById("ch").value =parseInt(document.getElementById("ch").value)-1;
					}
				}
				function send()
				{
		
				var ch = parseInt(document.getElementById("ch").value);
					if(ch %1 != 0)
						{
							document.getElementById("ch").value =  <? echo $tempCh;?>;
						}
						if(!(ch>0 && ch<=80))
						{
							document.getElementById("ch").value = <? echo $tempCh;?>;
						}
						else{
						$.ajax({
					url: "update.php",
					type: 'POST',
					data:{channel:$("#ch").val(),volume:$("#vol").val(),node:$("#node").val()},
					success: {}
					});
				
				}
			}
			
					
				</script>

		 </div> 
		 	  <div style="padding-top:20px;height:10%;width:80%;">
			<div style="width:100%;">
			<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		
				
			<button    style="min-width: 45%;"class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" <?=$_SESSION['en_node'];?> >Clear</button>
			<button   style="min-width:45%;" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" onclick = "send()" <?=$_SESSION['en_node']?> >Send</button>

	</div>
</div>
			
			</div>
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