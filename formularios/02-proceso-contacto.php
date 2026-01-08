<?php
// Antes validar y sanitizar
$nombre = $_POST['fname'];
$apellidos = $_POST['lname'];
$email = $_POST['email'];
$comentarios = $_POST['comentarios'];

$mensaje = "<p>Nombre: <strong>$nombre</strong></p>";
$mensaje .= "<p>Apellidos: <strong>$apellidos</strong></p>";
$mensaje .= "<p>Email: <strong>$email</strong></p>";
$mensaje .= "<p>Comentarios: <strong>$comentarios</strong></p>";

// $cabeceras = 'MIME-Version: 1.0\r\n';
// $cabeceras .= 'Content-type: text/html; charset=utf-8';



// Para enviar un correo HTML, el encabezado Content-type debe ser definido
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // Encabezados adicionales
    //  $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
    //  $headers[] = 'From: Cumpleaños <cumpleanos@example.com>';
    //  $headers[] = 'Cc: cumpleanos_archivo@example.com';
    //  $headers[] = 'Bcc: cumpleanos_verif@example.com';

     // Envío
   

// echo "Hola $nombre";
if(mail('lmanzaneques@alumnos.zaragozadinamica.es', 'Formulario de contacto desde web16.zaragozadinamica.org', $mensaje, implode("\r\n", $headers))){
     echo "tu mensaje ha sido enviado";
}else{
     echo "hubo un problema...";
}

?>