<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telefono = strip_tags(trim($_POST["phone"]));
    $mensaje = trim($_POST["message"]);

    if ( empty($nombre) || empty($email) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        echo "Por favor, completa el formulario correctamente.";
        exit;
    }

    $destinatario = "antonio.gonzalez.smr@gmail.com";//info@didassociacio.com
    $asunto = "Nuevo mensaje de contacto de $nombre";
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Email: $email\n";
    $contenido .= "Teléfono: $telefono\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    $cabeceras = "From: $nombre <$email>";

    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        header("Location: index.html?status=ok");
        exit;
    } else {
        header("Location: index.html?status=fail");
        exit;
    }
} else {
    echo "Método de envío no permitido.";
}
?>
