<?php
// Esto es para activar la visualización de errores en el servidor, por si los hubiese
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "email@email";
$email_subject = "Contacto desde el sitio web";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['nameLastname']) ||
!isset($_POST['email']) ||
!isset($_POST['number']) ||
!isset($_POST['texto'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre y Apellidos: " . htmlspecialchars($_POST['nameLastname']) . "\n";
$email_message .= "Correo Electronico: " . htmlspecialchars($_POST['email']) . "\n";
$email_message .= "Telefono : " . htmlspecialchars($_POST['number']) . "\n";
$email_message .= "Mensaje: " . htmlspecialchars($_POST['texto']) . "\n\n";

$email_from = htmlspecialchars($_POST['email']);
// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "¡El formulario se ha enviado con éxito!";
}
?>