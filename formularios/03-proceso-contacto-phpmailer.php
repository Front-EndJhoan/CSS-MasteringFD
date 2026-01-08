<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/Exception.php';
require 'src/SMTP.php';


$mail = new PHPMailer(true);

try {
// CONFIGURACIÓN SMTP
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'jhoancolinav@gmail.com';
$mail->Password   = 'xsmc bdan fbym gifo';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;

// REMITENTE
$mail->setFrom('jhoancolinav@gmail.com','Zaragoza Dinámica');

// DESTINATARIO
$mail->addAddress('jhoancolina12@outlook.es');

$nombre = $_POST['fname'];
$apellidos = $_POST['lname'];
$email = $_POST['email'];
$comentarios = $_POST['comentarios'];

$mensaje = "<p>Nombre: <strong>$nombre</strong></p>";
$mensaje .= "<p>Apellidos: <strong>$apellidos</strong></p>";
$mensaje .= "<p>Email: <strong>$email</strong></p>";
$mensaje .= "<p>Comentarios: <strong>$comentarios</strong></p>";

// CONTENIDO
$mail->isHTML(true);
$mail->Subject = 'Hola que tal';
$mail->Body    = $mensaje;

$mail->send();
echo '✅ Correo enviado correctamente';
}catch (Exception$e) {
echo "❌ Error al enviar: {$mail->ErrorInfo}";
}