<?php

if($_POST["channel"] != NULL && $_POST["volume"] != NULL){
		$info = "type=sendStorageData&channel=".$_POST["channel"]."&volume=".$_POST["volume"]."&machine_id=".$_POST["node"];
		//$response = http_get("http://api.leaning.me/nbtc/api_nbtc.php", $info);
		$url = 'http://api.leaning.me/nbtc/api_nbtc.php?key=evnu2013&'.$info;
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
		var_dump($result);
	}
?>