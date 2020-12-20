<?php

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: " .$correo . "<br> telefono:" . $telefono . "<br> Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try{
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    
    //Servers
    $mail->SMTPAuth = true;
    $mail->Username = 'multiserviciosmilagros1234@gmail.com';
    $mail->Password = 'multiserviciosmilagros141220';
    $mail->SMTPSecure = 'tls';
    
    //Acepted
    $mail->Port = 587;
    
    //Recipients
    $mail->setFrom('multiserviciosmilagros1234@gmail.com', $nombre);
    $mail->addAddress('multiserviciosmilagros1234@gmail.com');
    
    
    //Content
    $mail->isHTML(true);
    $mail->Subject = $mensaje;
    $mail->Body = $body;
    $mail->CharSet = 'UTF-8';
    
    $mail->send();
    echo '<script>
        alert("El mensaje se envio correctamente a Multiservicios Milagros");
        window.history.go(-1);
    </script>';
} catch (Exception $e){
    echo 'Hubo un error al enviar el mensaje: ', $mail->ErrorInfo;

}