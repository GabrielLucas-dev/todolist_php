<?php
include('./database/connect.php');

if(isset($_POST['alter_btn'])){
    $id_put = $_POST['id_put'];
    $novo_titulo = $_POST['novo_titulo'];
    $sql_put = "UPDATE tasks SET titulo = '$novo_titulo' WHERE id = '$id_put'";

    try{
        mysqli_query($conn, $sql_put);
    }
    catch (mysqli_sql_exception $e){
        $e->getMessage();
    }

    header("Location: index.php");
    exit;
}
?>