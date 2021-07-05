<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo Login</title>
    <style>
        body {
            text-align: center;
        }
        form {
            text-align: center;
        }
        input {
            text-align: center;
        }
    </style>
</head>
<body>
            
    <form method="post" action='principal.php'>
        <p>E-mail: </p><input type="text" name="email" id="inputEmail">
        <p>Senha: </p><input type="password" name="senha" id="inputSenha">
        <br><br>
        <button type="submit" id="buttonLogin">Login</button>
    </form>
    <br>
    <a href="index.php"><button>Menu principal</button></a>
    <script src="validarLogin.js"></script>
    
</body>
</html>