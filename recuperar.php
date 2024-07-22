<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "config.php";
require_once "conecta.php";
$conexao = conectar();

$email = $_POST['email'];
$sql = "SELECT * FROM usuario WHERE email='$email'";
$resultado = executarSQL($conexao, $sql);

$usuario = mysqli_fetch_assoc($resultado);
if ($usuario == null) {
    echo "Email não cadastrado! Faca o cadastro e em seguida realize o login.";
    die();
}
//gerar um token único
$token = bin2hex(random_bytes(50));

require_once 'PHPMailer-6.5.1/src/PHPMailer.php';
require_once 'PHPMailer-6.5.1/src/SMTP.php';
require_once 'PHPMailer-6.5.1/src/Exception.php';

$mail = new PHPMailer();
try {
    //config
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->setLanguage('br');
    //$mail->SMTPDebug = SMTP::DEBUG_OFF; //tira as mensagens de erro
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //imprime as mensagens de erro
    $mail->isSMTP(); //envia o email usando SMTP
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $config['email'];
    $mail->Password = $config['senha_email'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
        );

    $mail->setFrom($config['email'], 'Lorenzo');
    $mail->addAddress($usuario['email'], $usuario['nome']);
    $mail->addReplyTo($config['email'], 'Lorenzo');

    $mail->isHTML(true);
    $mail->Subject = 'Recuperação de Senha do Sistema';
    $mail->Body = 'Olá '.$usuario['nome'].', 
    Você solicitou o serviço de redefinição de senha. Por favor, clique no link para redefinir sua senha:
<a href="'. $_SERVER['HTTP_HOST'].'/trabalhoTopicos/nova-senha.php?email=' . $usuario['email'] .'&token=' . $token .'">Redefinir Senha</a>
    <br><br>Atenciosamente, Lorenzo!';
    
    $mail->send();
    echo 'Email enviado com sucesso!<br>Confira o seu email.';
    
    //gravar
    date_default_timezone_set('America/Sao_Paulo');
    $data = new DateTime('now');
    $agora = $data->format('Y-m-d H:i:s');

    $sql2 = "INSERT INTO `recuperar-senha`(email, token, data_criacao, usado) VALUES ('" . $usuario['email'] . "','$token', '$agora',0)";

    executarSQL($conexao, $sql2);

} catch (Exception $e) {
    echo "Não foi possível enviar o email.
    Mailer Erro: {$mail->ErrorInfo}";
}
