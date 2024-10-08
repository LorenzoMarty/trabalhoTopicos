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
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h1>Cadastrar</h1>
        <form action="cadastrar.php" method="post" enctype="multipart/form-data">
            <label for="nome">Nome:
                <input type="text" name="nome">
            </label>
            <label for="email">Email:
                <input type="text" name="email">
            </label>
            <label for="senha">Senha:
                <input type="password" name="senha">
            </label>
            <div class="img-area" data-img="">
                <i class='bx bxs-cloud-upload icon'></i>
                <h3>Envie uma Foto de Perfil</h3>
                <p>A Imagem não pode ser maior que <span>20MB</span></p>
                <input name="arquivo" type="file" id="Capa" style="display: none;">
            </div>
            <input type="submit" value="Enviar">
        </form>
        <div class="links">
            <a href="index.php">Login</a>
        </div>
    </div>
</body>
<script src="js/image.js"></script>

</html>