<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/formato1.css" rel="stylesheet">
   
  
    <title>Login</title>
<style> 
   body{
background-color: #f5f5f5;
}
</style>

</head>
<body class="text-center">

    <form method="post" action='cadastrarusuario.php' class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Cadastrar novo usuário</h1>
        <p>Nome completo: </p><input type="text" name="nome" id="inputNome" class="form-control"  placeholder="Nome">
        <br>
        <p>E-mail: </p><input type="text" name="email" id="inputEmail" class="form-control"  placeholder="E-mail">
        <br>
        <p>Senha: </p><input type="password" name="senha" id="inputSenha" class="form-control"  placeholder="Senha">
       <div>
       </form>
        <button  class="btn btn-lg btn-primary btn-block" id="buttonLogin">Cadastrar</button>
    <br>
    <br>
    
    <a href= "principal.php"> <p  class="btn btn-lg btn-primary btn-block">Voltar</p></a>
    </div>

    <?php
        if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
            $nome = $_POST['nome'];
            $nome = strtoupper($nome);
            $email = $_POST['email'];
            $senhacadastro = $_POST['senha'];
            include 'conexao_pgsql.php';

            $query = "SELECT * FROM usuario WHERE email = :email";
            $statement = $pdo->prepare($query);
            $statement->execute(['email'=>$email]);
            if ($statement->fetch()) {
                ?> <script>alert("O e-mail <?php echo $email ?> já encontra-se cadastrado no sistema!")</script> <?php
            } else {
                $query = "INSERT INTO usuario VALUES ('$email','$senhacadastro','$nome')";
                if ($statement = $pdo->query($query)){
                    ?> <script>alert("<?php echo $nome ?> cadastrado com sucesso!")</script> <?php
                } else {
                    ?> <script>alert("Falha ao cadastrar!")</script> <?php
                } 
            }

        }
    ?>
    
    
</body>
</html>