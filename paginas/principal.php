<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Tela de Login</title>
   
</head>
<body>
    
    <?php

        include 'conexao_pgsql.php';

        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        $query = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
        $statement = $pdo->prepare($query);
        $statement->execute(['email'=>$email,'senha'=>$senha]);
    
        if($usuario = $statement->fetch()){
            ?>
                <h3>Usuário <?php echo $usuario['nome'] ?></h3>
                <h4>Logado com sucesso</h4>
                <a href="login.php"><button class="btn btn-outline-primary">Deslogar</button></a>
                <hr>
                <form method="post" class="text-center">
               
                    <button type="submit" class="btn btn-outline-dark" name="botaofilan">Exibir fila normal</button>
                    <button type="submit" class="btn btn-outline-dark" name="botaofilap">Exibir fila preferencial</button>
                    <button type="submit" class="btn btn-outline-dark" name="botaochamarfilan">Chamar próximo da fila normal</button>
                    <button type="submit" class="btn btn-outline-dark" name="botaochamarfilap">Chamar próximo da fila preferencial</button>
                    <input type="hidden" name="email" id="inputEmail" value="<?php echo $email ?>">
                    <input type="hidden" name="senha" id="inputSenha" value="<?php echo $senha ?>">
                    <br>
                <hr>    
                </form>
                
            <?php

            function exibirFila($fila) {
                $statement = executarQuery("SELECT * FROM $fila");
                ?>
                    <table style="width:70%; text-align:center; margin-left:auto; margin-right:auto;" class="table table-hover">
                     <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Senha</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                        </tr>
                     </thead>
                        <?php
                            while ($dados = $statement->fetch()){
                                ?>
                                    <tr>  
                                        <td><?php echo $dados['nome'] ?></td>
                                        <td><?php echo $dados['senha'] ?></td>
                                        <td>
                                            <?php 
                                                $data = $dados['datasenha'];
                                                $data = substr($data,5)."-".substr($data,0,4);
                                                echo $data; 
                                            ?>
                                        </td>
                                        <td><?php echo $dados['horasenha'] ?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </table>
                <?php
                
            }

            function chamarProximo($fila) {
                $statement = executarQuery("SELECT * FROM $fila");
                if ($dados = $statement->fetch()) {
                    $nome = $dados['nome'];
                    $senha = $dados['senha'];
                    $getData = $dados['datasenha'];
                    $getHora = $dados['horasenha'];
                    if ($fila == "filanormal") {
                        $tiposenha = "Normal";
                    } else {
                        $tiposenha = "Preferencial";
                    }
                    executarQuery("DELETE FROM chamado");
                    executarQuery("INSERT INTO chamado VALUES ('$nome',$senha,'$tiposenha')");
                    executarQuery("DELETE FROM $fila WHERE senha = $senha");
                    ?> <h3 style="text-align:center">Próximo chamado com sucesso!</h3> <?php
                    ?> <h3 style="text-align:center">Nome: <?php echo $nome ?></h3> <?php
                    ?> <h3 style="text-align:center">Senha: <?php echo $senha." ".$tiposenha ?></h3> <?php
                } else {
                    ?> <h3 style="text-align:center">A fila chamada está vazia!</h3> <?php
                }
            }

            function executarQuery($query) {
                include 'conexao_pgsql.php';
               
                $statement = $pdo->query($query);
                return $statement;
               
            }

            if (isset($_POST['botaofilan'])){
                exibirFila("filanormal");
            } else {
                if (isset($_POST['botaofilap'])){
                    exibirFila("filapreferencial");
                } else 
                    if (isset($_POST['botaochamarfilan'])) {
                        chamarProximo("filanormal");
                    } else
                        if (isset($_POST['botaochamarfilap'])) {
                            chamarProximo("filapreferencial");
                        }
            }

        } else {
            ?>
                <script>alert("Falha ao logar! Usuário ou senha incorretos.")</script>
            <?php
            header("refresh:0;login.php");
            die();
        }
    ?>

</body>
</html>
