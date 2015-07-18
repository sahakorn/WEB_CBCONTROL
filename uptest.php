<?php
		
	$getMac = "http://api.leaning.me/nbtc/api_nbtc.php?key=evnu2013&type=get_machine_view";
	$getStatus = array(
		'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'GET'
			),
		);
		//$getContextSt  = stream_context_create($getStatus);
		//$result = file_get_contents($getMac, false, $getContextSt);
		$Obj = json_decode($result);
		var_dump($Obj);
?>
