<?php session_start();
require_once "conecta.php";
$conexao = conectar();
$usuario = conectarUsuario($conexao);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/image.css">
    <link rel="stylesheet" href="css/form.css">
    <link type="image/png" sizes="96x96" rel="icon" href="img/email.png">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Editar</h1>
        <form action="editar.php" method="post" enctype="multipart/form-data">
            <label for="nome">Nome:
                <input type="text" name="nome" value="<?= $usuario['nome']; ?>">
            </label>
            <label for="email">Email:
                <input type="text" name="email" value="<?= $usuario['email']; ?>">
            </label>
            <label for="senha">Senha:
                <input type="password" name="senha" value="<?= $usuario['senha']; ?>">
            </label>
            <div class="img-area" data-img="<?= $usuario['foto'] ?? ''; ?>">
                <i class='bx bxs-cloud-upload icon'></i>
                <h3>Envie uma Foto de Perfil</h3>
                <p>A Imagem não pode ser maior que <span>20MB</span></p>
                <input name="arquivo" type="file" id="Capa" style="display: none;" value="<?= $usuario['foto']; ?>">
                <?php if (!empty($usuario['foto'])) : ?>
                    <img src="img/usuarios/<?= $usuario['foto']; ?>" alt="Foto de Perfil">
                <?php endif; ?>
            </div>
            <input type="submit" value="Enviar">
        </form>
</body>
<script src="js/image.js"></script>

</html>