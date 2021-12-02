<?php session_start(); ?>

<html>
    <head>
        <title>Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="tarefas.css">
    </head>
    
    <body>
        <h1>Gerenciador de Tarefas</h1>
        <form>
            <fieldset>
                <legend>Nova Tarefa</legend>
                <label>
                    Tarefas:
                    <input type="text" name="nome" />
                </label>
                <input type="submit" value="Cadastrar" />
            </fieldset>
        </form>
        
        <?php 
            $lista_tarefas = [];
            
            if (array_key_exists('nome', $_GET)) {
                $lista_tarefas[] = $_GET['nome'];
            }
            
            if (array_key_exists('nome', $_GET)) {
                $_SESSION['lista_tarefas'][] = $_GET['nome'];

            }
            
            $lista_tarefas = [];

            if (array_key_exists('lista_tarefas', $_SESSION)) {
                $lista_tarefas = $_SESSION['lista_tarefas'];
            }
        ?>

    </body>

    <table>
        <tr>
            <th>Tarefas</th>
        </tr>

        <?php foreach ($lista_tarefas as $tarefas): ?>
            <tr>
                <td><?php echo $tarefas; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</html>