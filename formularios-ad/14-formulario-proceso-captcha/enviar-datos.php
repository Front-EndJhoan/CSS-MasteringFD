<?php
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: no-reply@midominio.com' . "\r\n";
$cabeceras .= 'Reply-To: contacto@midominio.com' . "\r\n";

function limpiar_dato($dato) {
    // Eliminar espacios en blanco al inicio y al final. ¿Para qué? Como los espacios en blanco son invisibles de conservarlos se pueden generar inconsistencias " Marta" no es igual a "Marta". A la hora de validar con expresiones regulares podrían dar error, por ejemplo, email

    $dato = trim($dato);

    // Eliminar etiquetas HTML y PHP. Para evitar inyecciones XSS (Cross Site Scripting). Inyección de código PHP/HTML. Capturar cookies de usuario. Redirecciones malicionas con la etiqueta <meta>. Insertar formularios falsos. Iframe para descargar automáticamente malware
    $dato = strip_tags($dato);

    // Convierte caracteres especiales a entidades HTML para evitar inyecciones XSS.
    $dato = htmlspecialchars($dato, ENT_QUOTES, 'UTF-8');

    // Devuelve el dato sanitizado
    return $dato;
}

// Verificar si el formulario ha sido enviado correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar que los campos no estén vacíos
    if (empty($_POST["nombre"]) || empty($_POST["email"]) || empty($_POST["comentarios"])) {
        die("Todos los campos son obligatorios.");
    }

    // Sanitización manual de los datos
    $nombre = limpiar_dato($_POST["nombre"]);
    $email = limpiar_dato($_POST["email"]);
    $comentarios = limpiar_dato($_POST["comentarios"]);

    // Validación del email utilizando una expresión regular básica
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El formato del email es inválido.");
    }
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
    $recaptcha_secret = 'CLAVE_PRIVADA'; 
    $recaptcha_response = $_POST['recaptcha_response']; 
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
    $recaptcha = json_decode($recaptcha); 

    if($recaptcha->score >= 0.7){
        /// Construcción del cuerpo del mensaje
    $body  = "<h2>Contacto a través del formulario de la web:</h2>\n";
    $body .= "<p>Nombre: <strong>" . $nombre . "</strong></p>\n";
    $body .= "<p>Email: <strong>" . $email . "</strong></p>\n";
    $body .= "<p>Comentarios: <strong>" . $comentarios . "</strong></p>";

    // Evitar inyecciones de cabeceras en el campo de email.
    if (preg_match("/[\r\n]/", $email)) {
        die("Intento de inyección de cabecera detectado.");
    }

    // Enviar el correo
    if (mail("xxxxxxx@xxxxxxxx.com", "Prueba desde mi web", $body, $cabeceras)) {
        echo "Tu mensaje ha sido enviado.";
    } else {
        echo "Lo sentimos, ha ocurrido un error al enviar el mensaje.";
    }
    }else{
        die("No eres humano");
    }
    

} else {
    die("Acceso no autorizado.");
}
?>
