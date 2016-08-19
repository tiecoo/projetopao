<?php

header("Content-Type: text/html; charset=UTF-8");

require 'PHPMailer-master/PHPMailerAutoload.php';
include('conf/conexao.php');

$todos = mysqli_query($link, "SELECT nome, email FROM funcionarios WHERE id NOT IN (SELECT func_id FROM dados WHERE dados.data BETWEEN DATE(NOW()) AND CONCAT(DATE(NOW()) , ' 12:30:00') )");


while ($email = mysqli_fetch_assoc($todos)) {
    $mail = new PHPMailer(true);

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
    if ($email['email'] != '') {
        $mail->addAddress($email['email'], $email['nome']);  // Add a recipient
        $mail->addReplyTo('webmaster2@mfrural.com.br', 'Information');

        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Pão nosso de cada dia';
        $mail->Body = 'Boa tarde ' . $email['nome'] . ', Você ainda não pediu pão hoje!<br/> Lembrando que os pedidos encerrarão �s 14:30h.<br/>Segue o link para tal: http://pao.grupomfrural.com.br/ <br/>Lembrando que esse e-mail é automático e não precisa de resposta.<br/><br/>Atenciosamente,<br/><br/>Desenvolvedor PHP Junior,<br/> Diego Pereira</b>';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
}
