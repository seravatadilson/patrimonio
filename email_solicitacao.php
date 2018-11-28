<?php
    // Caminho da biblioteca PHPMailer
    require 'PHPMailer/PHPMailerAutoload.php';
#function enviaEmail($solicitante,$email,$atividade,$local,$data,$horaini,$horafim)
function enviaEmail($solicitante,$email,$atividade,$local,$data,$horaini, $horafim)
{


    // Instância do objeto PHPMailer
    $mail = new PHPMailer;
    // Configura para envio de e-mails usando SMTP
    $mail->IsSMTP();

    // Servidor SMTP
    $mail->Host = 'smtp.gmail.com';
    $mail->Charset = 'UTF-8';
    
    // Usar autenticação SMTP
    $mail->SMTPAuth = true;
    // Usuário da conta
    $mail->Username = 'comunicacaointernaicet@gmail.com';

    // Senha da conta
    $mail->Password = '92457164teste';

    // Tipo de encriptação que será usado na conexão SMTP
    $mail->SMTPSecure = 'ssl';

    // Porta do servidor SMTP
    $mail->Port = 465;

    // Informa se vamos enviar mensagens usando HTML
    $mail->IsHTML(true);
    $mail->SMTPDebug = 1;
    // Email do Remetente
    $mail->From = ('comunicacaointernaicet@gmail.com');

    // Nome do Remetente
    $mail->FromName = $solicitante;

    // Endereço do e-mail do destinatário
    #$mail->addAddress('patrimonioicet@gmail.com'); //email do patrimonio
    //$mail->addAddress('diogo.santtosicet@gmail.com'); //email do solicitante
    $mail->addAddress($email); //email do solicitante


    // Assunto do e-mail
    $mail->Subject = 'Reservas de '.$local;

    // Mensagem que vai no corpo do e-mail
    $mail->Body = "Olá ".$solicitante.", a sua reserva foi efetuada com sucesso de acordo com as informações abaixo.<br><p></p>";
    $mail->Body .= "Email do solicitante: " . $email . "<br><p></p>";
    $mail->Body .= "Atividade: ".$atividade."<br><p></p>";
    $mail->Body .= "Data: ".$data."<br><p></p>";
    $mail->Body .= "Local: ".$local."<br><p></p>";
    $mail->Body .= "Horário: Início às ".$horaini." término às ".$horafim."<br><p></p>";

    // Envia o e-mail e captura o sucesso ou erro
    if ($mail->Send()) {
        echo "<script>alert('Email enviado com Sucesso!');location.href=('../home.php');</script>";
    } else {
      
        echo "<script>alert('Erro ao Enviar! Favor informar erro ao Admnistrador!');location.href=('../home.php');</script>";
        
    }
}
?>
