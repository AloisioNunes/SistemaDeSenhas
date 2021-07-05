<?php
    
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $servidor = "localhost";
    $banco = "bancofilas";
    $porta = 5432;
    $usuario = "postgres";
    $senha = "9700";
    $dsn = "pgsql:host=$servidor;port=$porta;dbname=$banco;";

    $pdo = new PDO($dsn,$usuario,$senha,$options);


?>