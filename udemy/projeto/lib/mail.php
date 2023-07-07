<?php
use PHPMailer\PHPMailer\PHPMailer;

function enviar_email($destinatario, $assunto, $mensagemHTML){

    require 'vendor/autoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    // $mail->SMTPDebug = 2;
    $mail->Host = "smtp.office365.com";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "emanuelemreis@gmail.com";
    $mail->Password = "2602jack";
    $mail->SMTPSecure = "starttls";

    $mail->setFrom('emanuelemreis@gmail.com', "Olá");
    $mail->addAddress($destinatario);
    $mail->Subject = $assunto;
    $mail->msgHTML("<h1>Enviado</h1>");
    $mail->Body = $mensagemHTML;

    if($mail->send()){
        return true;
    } else {
        return false;
    }
}
?>