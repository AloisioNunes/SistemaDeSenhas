<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/formato1.css" rel="stylesheet">
    <title>Cadastrar Senha</title>
    <style> 
   body{
background-color: #f5f5f5;
}
</style>
</head>
<body class="text-center">
    
    <form method="post" action="cadastrarsenha.php" class="form-signin">
        <p>Nome: </p><input name="nome">
        <br><br>
        <p>Tipo de senha: </p>
        <select style="width: auto; margin:0 auto;" class="form-select form-select-sm" aria-label=".form-select-sm example" name="select">
            <option value="np">Normal</option>
            <option value="p">Preferencial</option>
        </select>
        <br>
        <button type="submit" class="btn btn-lg btn-primary btn-block" name="buttoncadastrar">Cadastrar Senha</button>
        <br>
    
    <br>
    <a href="index.php"><p class="btn btn-lg btn-primary btn-block">Menu principal</p</a>
</form>
</body>
</html>