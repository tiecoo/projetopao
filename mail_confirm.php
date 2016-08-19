<?php

header("Content-Type: text/html; charset=UTF-8");

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer(true);
$mail2 = mysqli_query($link, "SELECT email, nome, dados.id FROM funcionarios f "
        . "INNER JOIN dados "
        . "ON dados.func_id = f.id "
        . "AND dados.data "
        . "BETWEEN DATE(NOW()) AND CONCAT(DATE(NOW()) , ' 18:30:00') "
        . "WHERE f.id = $func ");
$mail3 = mysqli_fetch_assoc($mail2);
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'webmaster2@mfrural.com.br';                 // SMTP username
$mail->Password = 'mfrural002';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = '587';
$mail->CharSet = 'UTF-8';

$mail->From = 'webmaster2@mfrural.com.br';
$mail->FromName = 'Diego Pereira';

$mail->addAddress($mail3['email'], $mail3['nome']);  // Add a recipient
$mail->addReplyTo('webmaster2@mfrural.com.br', 'Information');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Confirmação do pedido do pão';
$mail->Body = "Obrigado {$mail3['nome']}, <br/> Lembrando que você pode cancelar o pedido do pão até as 14:30h.<br/>Clique <a href='http://pao.grupomfrural.com.br/delete.php?dadosid={$mail3['id']}'>aqui</a> <br/><br/>Atenciosamente,<br/>Diego Pereira,<br/><br/>Desenvolvedor PHP Junior</b>";

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
