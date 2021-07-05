<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Senha</title>
</head>
<body>

<?php


    if (isset($_POST['buttoncadastrar'])){
        
        if (isset($_POST['nome'])) {
            $nome = $_POST['nome'];

            if (strlen($nome) == 0) {
                ?> <script>alert("Nome não inserido!")</script> <?php
                header("refresh:0;cadastrarsenha_index.php");
                die();
            } else {
                
                if ($_POST['select'] == "np") {
                    $senha = cadastrarNaFila("filanormal",$nome);
                } else {
                    $senha = cadastrarNaFila("filapreferencial",$nome);
                }

            }

        } else {
            ?> <script>alert("Nome não inserido!")</script> <?php
            header("refresh:0;cadastrarsenha_index.php");
            die();
        }
        
    }

    function cadastrarNaFila($fila,$nome){
        include 'conexao_pgsql.php';
        include 'datahora.php';
        $nome = strtoupper($nome);
        $dataHora = new DataHora();
        $getData = $dataHora->getData();
        $getHora = $dataHora->getHora();
        $query = "INSERT INTO $fila (nome,datasenha,horasenha) VALUES (:nome,:getData,:getHora)";
        $statement = $pdo->prepare($query);
        if ($statement->execute(['nome'=>$nome,'getData'=>$getData,'getHora'=>$getHora])){
            $query = "SELECT senha FROM $fila WHERE nome = :nome AND datasenha = :getData AND horasenha = :getHora";
            $statement = $pdo->prepare($query);
            $statement->execute(['nome'=>$nome,'getData'=>$getData,'getHora'=>$getHora]);
            $senha = $statement->fetch();
            $senha = $senha['senha'];
            if ($fila == "filanormal") {
                $fila = "";
            } else {
                $fila = "Preferencial";
            }
            ?> 
                <h3>Cadastrado com sucesso!</h3> 
                <h3>Nome: <?php echo $nome ?></h3>
                <h3>Senha: <?php echo $senha." ".$fila ?></h3>
                <a href="cadastrarsenha_index.php"><button>Voltar</button></a>
            <?php
            header("refresh:5;cadastrarsenha_index.php");
            die();
        }
    }

?>
    
</body>
</html>