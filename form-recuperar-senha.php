<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link type="image/png" sizes="96x96" rel="icon" href="img/email.png">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3>Digite o seu email para que você possa criar uma nova senha.</h3><br>
    <form action="recuperar.php" method="post">
        <label for="Email">Email:<input type="text" name="email"></label>
        <input type="submit" value="Enviar email de recuperação">
    </form>
    </div>
</body>
</html>