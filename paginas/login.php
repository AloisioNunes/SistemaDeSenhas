<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/formato1.css" rel="stylesheet">
   
  
    <title>Exemplo Login</title>
<style> 
   body{
background-color: #f5f5f5;
}
</style>

</head>
<body class="text-center">

    <form method="post" action='principal.php' class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Coloque seus dados</h1>
    <!--<input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus> -->
        <p>E-mail: </p><input type="text" name="email" id="inputEmail" class="form-control"  placeholder="E-mail">
        <br>
        <p>Senha: </p><input type="password" name="senha" id="inputSenha" class="form-control"  placeholder="Senha">
       
        
       <div>
       </form>
        <button  class="btn btn-lg btn-primary btn-block" id="buttonLogin">Login</button>
    <br>
    <br>
    
    <a href= "index.php"> <p  class="btn btn-lg btn-primary btn-block">Menu principal</p></a>
    </div>
    <script src="validarLogin.js"></script>
    
</body>
</html>