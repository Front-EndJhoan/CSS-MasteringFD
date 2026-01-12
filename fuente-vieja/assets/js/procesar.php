<?php
$secretKey = "6Lcz2kcsAAAAAK-TfCFkcERAzA8_BiefehFVcrJf";

$responseKey = $_POST['recaptcharesponse'];
$userIP = $_SERVER['REMOTE_ADDR'];

$url = "https://www.google.com/recaptcha/api/siteverify";
$data = [
    'secret' => $secretKey,
    'response' => $responseKey,
    'remoteip' => $userIP
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$response = json_decode($verify);

if ($response->success) {
    echo "Formulario enviado correctamente";
    // aquí procesas el formulario
} else {
    echo "Captcha inválido. Intenta de nuevo.";
}
?>
