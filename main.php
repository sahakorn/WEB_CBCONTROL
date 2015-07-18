<?php
/*require "config.php";
session_start();
if(!isset($_SESSION['login_user']))
{
	header('Location: login.php');
	exit;
}
	$sql = "SELECT UserID, chennel, timsp FROM channel ORDER BY timsp DESC , timsp ASC LIMIT 0 , 1";
	$sql2 = "SELECT userID, sound, timesp   FROM sound ORDER BY timesp DESC , timesp ASC  LIMIT 0 , 1";
	$query =  mysqli_query($conn,$sql)or die("SQL::command Error");
	$query2 =  mysqli_query($conn,$sql2)or die("SQL::command Error");
	$rows =  mysqli_num_rows($query);
	$rows2 =  mysqli_num_rows($query2);
		if($rows==1 && $rows2 == 1)
		{	
			while ($row = mysqli_fetch_assoc($query)) 
			{
				
				$username = $row["UserID"];
				$ch = $row["chennel"]*1;
				$time = $row["timsp"];
			}
			while ($row2 = mysqli_fetch_assoc($query2)) 
			{
				
				$volume = $row2["sound"]*1;
			}
		} 
		else
		{
			//echo "&".$username."@".$ch."%".$volume."#".$time."!";
		}
*/

?>


<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="">
		<title>NBTC_NU</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/ripples.min.css" rel="stylesheet">
        <link href="css/material-wfont.min.css" rel="stylesheet">
		 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		 <script src="Register/Check.js" type="text/javascript"></script>
		<style>
.button {
   background-color:#44c767;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627; 
}
.button:hover{
	background-color:#5cbf2a;
	box-shadow .28s cubic-bezier(.4,0,.2,1); }
.button:active {
	position:relative;
	box-shadow: 0px 0px 8px #80f709; 
	top:1px;
}
.button1 {
	-webkit-animation: change 0.5s infinite;
	}
@-webkit-keyframes change {
    from {border: 1px solid #c4c4c4; 
    height: 50px; 
    width: 100px; 
    font-size: 13px; 
	background-color:#80f709;
    padding: 4px 4px 4px 4px; 
    border-radius: 4px; 
    -moz-border-radius: 4px; 
    -webkit-border-radius: 4px; 
    box-shadow: 0px 0px 8px #80f709; 
    -moz-box-shadow: 0px 0px 8px #80f709; 
    -webkit-box-shadow: 0px 0px 8px #80f709; }
    to {  border: 1px solid #c4c4c4; 
    height: 50px; 
    width: 100px; 
    font-size: 13px; 
	background-color:#80f709;
    padding: 10px 10px 10px 10px; 
    border-radius: 4px; 
    -moz-border-radius: 4px; 
    -webkit-border-radius: 8px; 
    box-shadow: 5px 5px 10px #336323; 
    -moz-box-shadow: 5px 5px 12px #336323; 
    -webkit-box-shadow: 5px 5px 10px #336323; }
}  

		</style>
    </head>

 	    <style type="text/css">
    /* Special class on .container surrounding .navbar, used for positioning it into place. */
.navbar-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  z-index: 20;
  margin-top: 20px;
}

/* Flip around the padding for proper display in narrow viewports */
.navbar-wrapper .container {
  padding-left: 0;
  padding-right: 0;
}
.navbar-wrapper .navbar {
  padding-left: 15px;
  padding-right: 15px;
}

.navbar-content
{
    width:320px;
    padding: 15px;
    padding-bottom:0px;
}
.navbar-content:before, .navbar-content:after
{
    display: table;
    content: "";
    line-height: 0;
}
.navbar-nav.navbar-right:last-child {
margin-right: 15px !important;
}
.navbar-footer 
{
    background-color:#DDD;
}
.navbar-footer-content { padding:15px 15px 15px 15px; }
.dropdown-menu {
padding: 0px;
overflow: hidden;
}   


@media ( max-width: 585px ) {
    .input-group span.input-group-btn,.input-group input,.input-group button{
        display: block;
        width: 100%;
        border-radius: 0;
        margin: 0;
    }
    .input-group {
        position: relative;   
    }
    .input-group span.data-up{
        position: absolute;
        top: 0;
    }
    .input-group span.data-dwn{
        position: absolute;
        bottom: 0;
    }
    .form-control.text-center {
        margin: 34px 0;
    }
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group{
        margin-left:0;
    }
	.navbar navbar-inverse
	{
	 position:fixed;
	 z-index:100px;
	}

 </style>

    <body>

        <!-- Your site -->

<div class="container">
		<div class="navbar navbar-inverse">
			<div class="navbar-header"><img src="Picture/Logo_nbtc.png" width="60" height="68" />
			</a>
			</div> <div class="navbar-header"><img src="Picture/LogoKTS.PNG" width="60" height="68" /></div>
		    <div class="navbar-header">&nbsp &nbsp  &nbsp&nbsp </div>
			<div class="navbar-header"><br>
			<center><span class="icon-bar"><font color ="#ecf0f1" size = "4">ระบบตรวจสอบความถี่วิทยุย่านความถี่  VHF โดยการควบคุมระยะไกลผ่านเครือข่ายอินเทอร์เน็ต
				</center> </font>
				</div>
				
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				
				<!--
				<form class="navbar-form navbar-left">
					<input type="text" class="form-control col-lg-8" placeholder="Search">
				</form>
				-->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account
											<b class="caret"></b></a>

						<ul class="dropdown-menu">
							<li>
								<div class="navbar-content">
									<div class="row">
										<div class="col-md-5">
											<img src="pic/photo.jpg" alt="Alternate Text" class="img-responsive" />
											<p class="text-center small"> <a href="#">Change Photo</a>
											</p>
										</div>
										<div class="col-md-7"> <span><?=$_SESSION['login_user']?></span>

											<p class="text-muted small"><?=$_SESSION['login_user'];?></p>
											<div class="divider"></div> <a href="edit_account.php" class="btn btn-primary btn-sm active">View Profile</a>

										</div>
									</div>
								</div>
								<div class="navbar-footer">
									<div class="navbar-footer-content">
										<div class="row">
											<div class="col-md-6"> <a href="edit_account.php" class="btn btn-default btn-sm">Change Passowrd</a>

											</div>
											<div class="col-md-6"> <a href="logout.php" class="btn btn-default btn-sm pull-right">Sign Out</a>

											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>

				</ul>
			</div>
		</div>
		
				
		<div class = "jumbotron"><center>
			<div id="Show_Video"></div><br>
			เลือกช่องสัญญาณ(Channel) หรือ ระดับความดัง (Volume) ที่ต้องการแล้ว กดปุ่ม ENTER ที่แป้นพิมพ์  หรือ กดปุ่ม SEND ด้านขวามือ </center>
	</div>
		
		
		<div id = "temp" class="jumbotron">
			
					<div class="row">
					<div class="col-xs-3"><br>
				<center>
			<img src="Picture/Logo_nbtc.png" width="85" height="100" />
			<h3>Remote control</h3>
				</center>
				
				</div>
				<div class="col-xs-3">
				
				<center>
						<center>
						<h3>Channel</h3>
						<span>Between 1 - 80 only.</span>
					</center>

					<br>
					

					<div class="input-group number-spinner">
						<span class="input-group-btn data-dwn">
							<button  class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
						</span>
						<input type="text" id = "ch" name="ch" class="form-control text-center" value=<?=$ch?> min="1" max="80" onchange="checkChannel(this.value)">
						<span class="input-group-btn data-up">
							<button  class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
						</span>
					</div>
					
					</center>
				</div>
				
				<div class="col-xs-3">
					<center>
						<h3>Volume</h3>
						<span>Between 0 - 9 only.</span>
						</center>
						<br>
						<div class="input-group number-spinner">
						
						<span class="input-group-btn data-dwn">
							<button  class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
						</span>
						<input type="text" id = "volume" name="volume" class="form-control text-center" value= <?=$volume?> min="0" max="9" onchange="checkVolume(this.value)">
						<span class="input-group-btn data-up">
							<button  class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
						</span>
						
					</div>
					
					</center>
			
				</div>
				
				<div class="col-xs-3"><br><br>
				<center>
				<span>กดปุ่มเพื่อสั่งงาน.</span><br>
					<h4><input type ="button" class = "button"  id ="snd" name="snd" value="SEND" onclick = "send()"></h4>
					<span id = "status" style="display: none">Status : </span>
				<span id = "wait" style="display: none">Pleas Wait...  </span>
				<span id = "send" style="display: none" >Sending...</span>
				 <span id = "success" style="display: none">Success!</span>
				 <span id = "fail" style="display: none">Failed!</span>
				 <span id = "info" style="display: none">Failed.: Please Refresh and send again.</span></center>
				
				</div>
				
			</div>
				
		</div>
		
		<div class="footer"><center>
				<p>Made by <a href="http://thomaspark.me" rel="nofollow">XEUS-LAB</a>. Contact him at <a href="mailto:thomas@bootswatch.com">xeus-lab@nu.ac.th</a>.
				Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/gh-pages/LICENSE">MIT License</a>.
				Based on <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>
			 </center>
			
		</div>	

	</div>    
		
        <!-- Your site ends -->

        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<script src="js/jwplayer.js"></script>
        <script src="js/ripples.min.js"></script>
        <script src="js/material.min.js"></script>
		<script src="js/snackbar.min.js"></script>
        <script src="noUiSlider/jquery.nouislider.all.min.js"></script>
		<script src="js/main.js"></script>
		
		
        <script>
			
            $(document).ready(function() {
                $.material.init();
				
				jwplayer('Show_Video').setup({
					file: 'rtmp://27.254.38.209/live/node1',
				   image: '//www.longtailvideo.com/content/images/jw-player/lWMJeVvV-876.jpg',
					title: 'PLAY',
					width: '640',
					height: '320',
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
            });
        </script>
    </body>
</html>