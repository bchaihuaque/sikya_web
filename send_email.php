<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Configurar el destinatario del correo
    $to = "bchd.dataanalysis@gmail.com";  // Cambia esto con tu dirección de correo
    $subject = "Nuevo mensaje de contacto de $name";
    
    // Formato del correo
    $body = "Nombre: $name\n";
    $body .= "Correo electrónico: $email\n\n";
    $body .= "Mensaje:\n$message";

    // Cabeceras del correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
            // Redirigir con éxito
            header("Location: index.php?success=true");
            exit;
        } else {
            // Redirigir con error
            header("Location: index.php?error=true");
            exit;
        } else {
        // Redirigir con error si la validación falla
        header("Location: index.php?error=true");
        exit;
    } else {
    // Si no es POST, redirigir al inicio
    header("Location: index.php");
    exit;
    }
  }
?>
