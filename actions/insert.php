<?php
include('./database/connect.php');

if (isset($_POST['add_btn'])) {
    $titulo = $_POST['titulo'];

    $sql_insert = "INSERT INTO tasks (titulo) 
                    VALUES ('$titulo')";

    try {
        if (!empty($_POST['titulo'])) {       //não se pode validar o campo pela variavel que recebe o valor do input e sim pelo propio 'name' do input
            mysqli_query($conn, $sql_insert);
        } else {
            echo 'atividade não preenchida (reload da pagina)';
        }
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
        // echo '<script>alert("Erro ao adicionar atividade")</script>';
    }

    header("Location: index.php");
    exit;
    // mysqli_close($conn);
}
