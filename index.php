<?php
include('./database/connect.php');

$sql_select = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql_select);

// var_dump($values);
?>

<!-- --------------------------------------------------- -->

<!-- BLOCO ADICIONAR TAREFA -->
<?php
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
?>

<!-- --------------------------------------------------- -->

<!-- BLOCO DELETAR TAREFA -->
<?php
if (isset($_POST['remove_btn'])) {
    $id_delete = $_POST['id'];

    try {
        $sql_delete = "DELETE FROM tasks WHERE id = '$id_delete'";
        mysqli_query($conn, $sql_delete);
        echo "<script>window.location.realod();</script>";
    } catch (mysqli_sql_exception $e) {
        $e->getMessage();
        echo "ERRO???";
    }

    // exit;                      
}
?>

<!-- --------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <title>ToDoList PHP</title>
</head>

<body>
    <section class="container-main">
        <div class="inner-container">
            <div class="main-title">
                <h2>Vamo querer...</h2>
            </div>
            <form class="form-actions" action="index.php" method="post">
                <input type="text" name="titulo" placeholder="tarefa a ser adicionada..." required>
                <button type="submit" name="add_btn">adicionar</button>
            </form>

            <div class="container-tasks">

                <!-- funciona como o map do JS/Node -->
                <?php if (mysqli_num_rows($result) > 0) : ?>
                    <?php while ($row = (mysqli_fetch_assoc($result))) : ?>

                        <div class="task">
                            <div class="task-title">
                                <input type="checkbox" id="checkbox" onclick="handleCheckbox()">
                                <p id="task_title"> <?php echo $row['titulo'] ?> </p>
                            </div>
                            <form action="index.php" method="post">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button class="remove" type="submit" name="remove_btn">
                                    Remover
                                </button>
                                <button class="edit" name="edit_btn">
                                    Editar
                                </button>
                            </form>
                        </div>

                    <?php endwhile ?>
                <?php endif ?>

            </div>

        </div>
    </section>
    <script src="scripts.js"></script>
</body>

</html>