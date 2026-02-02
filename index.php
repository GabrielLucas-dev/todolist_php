<?php
include('./database/connect.php');
include('./actions/insert.php');
include('./actions/delete.php');
include('./actions/put.php');

$sql_select = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql_select);

// var_dump($values);
?>


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
                <h2>Adicionar tarefa</h2>
            </div>
            <form class="form-actions" action="index.php" method="post">
                <input type="text" name="titulo" placeholder="tarefa a ser adicionada..." required>
                <button type="submit" name="add_btn">Adicionar</button>
            </form>

            <div class="container-tasks">

                <!-- funciona como o map do JS/Node -->
                <?php if (mysqli_num_rows($result) > 0) : ?>
                    <?php while ($row = (mysqli_fetch_assoc($result))) : ?>

                        <div class="task">
                            <div class="layout-tasks">
                                <div class="task-title">
                                    <form action="./actions/insert.php" method="post">
                                        <input type="checkbox" name="checkbox_input" id="checkbox" data-id="<?= $row['id'] ?>" onchange="handleCheckbox(this)">
                                    </form>
                                    <p class="task_title"> <?php echo $row['titulo'] ?> </p>
                                </div>

                                <form action="index.php" method="post">
                                    <input type="hidden" name="id_delete" value="<?= $row['id'] ?>">
                                    <button class="remove" type="submit" name="remove_btn">
                                        Remover
                                    </button>
                                    <input type="hidden" name="id_put" value="<?= $row['id'] ?>">
                                    <a class="edit" name="edit_btn" data-id="<?= $row['id'] ?>" onclick="handlePut(this)">
                                        Editar
                                    </a>
                                </form>
                            </div>

                            <div class=" edit_input hidden">
                                <form action="index.php" method="post">
                                    <input type="hidden" name="id_put" value="<?= $row['id'] ?>">
                                    <input type="text" class="novo-titulo" name="novo_titulo" placeholder="novo titulo..." value=" <?= $row['titulo'] ?>" required>
                                    <button type="submit" class="alter" name="alter_btn">Alterar</button>
                                </form>
                            </div>

                        </div>

                    <?php endwhile ?>
                <?php endif ?>

            </div>
        </div>
    </section>
    <script src="scripts.js"></script>
</body>

</html>

<!-- ARRUMAR O JS DO BOTAO "EDITAR" -->
<!-- FAZER O FORM "HIDDEN" FUNCIONAR -->