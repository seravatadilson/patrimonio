<?php
// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$to      = 'patrimonioicet@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: comunicacaointernaicet@gmail.com' . "\r\n" .
    'Reply-To: comunicacaointernaicet@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)){
    echo "Mensagem enviada com sucesso";

}else{
    echo "A mensagem não pode ser enviada";
}
?>


