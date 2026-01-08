<?php
$nombre = $_POST['fname'];
$apellidos = $_POST['lname'];
$email = $_POST['email'];
$comentarios = $_POST['comentarios'];
$mensaje = "Nombre: <strong>$nombre</strong><br>";
$mensaje .= "Apellidos: <strong>$apellidos</strong><br>";
$mensaje .= "Email: <strong>$email</strong><br>";
$mensaje .= "Comentarios: <strong>$comentarios</strong><br>";

// $cabeceras = 'MIME-Version: 1.0 \r\n';
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
mail('acampo@zaragozadinamica.es', 'Formulario de contacto desde web16.zaragozadinamica.org', $mensaje, implode("\r\n", $headers));

?>