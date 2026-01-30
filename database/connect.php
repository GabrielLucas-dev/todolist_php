<?php 

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $db_server = 'localhost';
    $db_user = 'root';
    $db_name = 'todolist_db';
    $db_port = 3307;
    $db_password = '';
    $conn = '';

    try{
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name, $db_port); //a ordem importa para a conexão!
        // echo "conexão com o banco de dados feita com sucesso!";
    } 
    catch (mysqli_sql_exception $e) {
        die($e->getmessage());
        echo "Conexão com o banco de dados falhou";  
    }

    // if($conn) {
    //     echo "Conexão com o banco de dados feita com sucesso!";
    // }
?>