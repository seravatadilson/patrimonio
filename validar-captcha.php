<?php

$response = $_POST["g-recaptcha-response"];
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6LdOSHoUAAAAAOFIb_MHmY5lccFLRp9Ac2nobGyW',
		'response' => $_POST["g-recaptcha-response"]
	);
	$options = array(
		'http' => array (
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n", 
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);
	if ($captcha_success->success==false) {
		echo "<p>Você é um bot! Vá embora!</p>";
	} else if ($captcha_success->success==true) {
        #echo "<p>You are not not a bot!</p>";
        echo "<script>alert('Senha Alterada com Sucesso!'); location.href=\"home.php\";</script>";
        //header('location: home.php');
	}

?>