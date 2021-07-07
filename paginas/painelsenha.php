<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha</title>
    <style>
        body {
            text-align: center;
            font-family: arial;
            background-color: #f5f5f5;
}

        
    </style>
</head>
<body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <hr style="width:50%;">

    <h1>Painel de chamado</h2>
    <?php
        include 'conexao_pgsql.php';
        $statement = $pdo->query("SELECT * FROM chamado");
        if($dados = $statement->fetch()) {
            ?><h2><?php echo $dados['nome'] ?></h2><?php
            ?>  <h2>Senha: 
                    <?php echo $dados['senha'];
                        if ($dados['tiposenha'] == "Preferencial") {
                            echo " Preferencial";
                        } 
                    ?>
                </h2>
                <hr style="width:50%;">
            <?php
        } else {
            ?> <h2>----</h2> <?php
        }
            header("refresh:1;painelsenha.php");
            die();
    ?>
    
    

</body>
</html>