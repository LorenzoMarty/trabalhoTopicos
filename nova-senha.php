<?php

$email = $_GET['email'];
$token = $_GET['token'];

require_once "conecta.php";
$conexao = conectar();
    $sql = "SELECT * FROM `recuperar-senha` WHERE email='$email' AND token='$token'";
    $resultado = executarSQL($conexao, $sql);
    $recuperar = mysqli_fetch_assoc($resultado);

    if ($recuperar == null) {
        die("Email ou token incorreto. Tente fazer um novo pedido de recuperação de senha.");
    } else {
        //verifica a validade do pedido (data_criacao)
        //verifica se o link já foi usado
        date_default_timezone_set('America/Sao_Paulo');
        $agora = new DateTime('now');
        $data_criacao = DateTime::createFromFormat(
            'Y-m-d H:i:s',
            $recuperar['data_criacao']
        );
        $UmDia = DateInterval::createFromDateString('1 day');
        $dataExpiracao = date_add($data_criacao, $UmDia);

        if ($agora > $dataExpiracao) {
            echo "Essa solicitação de recuperação de senha expirou!
        Faça um novo pedido de recuperação de senha.";
            die();
        }
        if ($recuperar['usado'] == 1) {
            echo "Esse pedido de recuperação de senha já foi utilizado anteriormente! 
            Para recuperar a senha faça um novo pedido de recuperação de senha.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link type="image/png" sizes="96x96" rel="icon" href="img/email.png">
    <title>Document</title>
</head>
<style>
    .email{
        text-align: center;
    }
</style>
<body>
    <div class="container">
    <form action="salvar-nova-senha.php" method="post">
        <input type="hidden" name="email" value="<?= $email; ?>">
        <input type="hidden" name="token" value="<?= $token; ?>">
        <div class="email">Email:<?= $email; ?><br></div>
        <label for="senha">Senha: <input type="password" name="senha"></label><br>
        <label for="repita senha">Repita a senha: <input type="password" name="repetirSenha"></label><br>
        <input type="submit" value="Salvar nova senha">
    </form>
    </div>
</body>
</html>