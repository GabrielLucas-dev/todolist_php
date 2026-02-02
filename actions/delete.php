<?php
include('./database/connect.php');

if (isset($_POST['remove_btn'])) {
    $id_delete = $_POST['id_delete'];

    try {
        $sql_delete = "DELETE FROM tasks WHERE id = '$id_delete'";
        mysqli_query($conn, $sql_delete);
    } catch (mysqli_sql_exception $e) {
        $e->getMessage();
        echo "ERRO???";
    }
}
?>