<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Senha</title>
</head>
<body>
    
    <form method="post" action="cadastrarsenha.php">
        <p>Nome: </p><input name="nome">
        <p>Tipo de senha: </p>
        <select name="select">
            <option value="np">Normal</option>
            <option value="p">Preferencial</option>
        </select>
        <br><br>
        <button type="submit" name="buttoncadastrar">Cadastrar Senha</button>
    </form>
    <br>
    <a href="index.php"><button>Menu principal</button></a>
</body>
</html>