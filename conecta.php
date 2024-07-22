<?php

function conectar()
{
    include 'config.php';
    $conexao = mysqli_connect(
        $config['host'],
        $config['user'],
        $config['pass'],
        $config['db']
    );
    if ($conexao === false) {
        echo "Erro ao conectar à base de dados. Nº do erro: " . mysqli_connect_errno() . ". " . mysqli_connect_error();
        die();
    }
    return $conexao;
}

function executarSQL($conexao, $sql)
{
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado === false) {
        echo "Erro ao executar o comando sql" . mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
    return $resultado;
}
function conectarUsuario($conexao)
{
    $sql = "SELECT * FROM usuario WHERE email='" . $_SESSION['email'] . "'";
    $resultado = executarSQL($conexao, $sql);

    $usuario = mysqli_fetch_assoc($resultado);

    return $usuario;
}
