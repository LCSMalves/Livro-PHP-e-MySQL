<?php session_start(); ?>

<html>
    <head>
        <title>Gerenciador de contatos</title>
        <link rel="stylesheet" href="tarefas.css">
    </head>

    <body>
        <h1>Contatos</h1>
        <form>
            <fieldset>
                <legend>Novo Contato</legend>
                <label>
                    Contatos:
                    <input type="text" name="contato" />
                </label>
                <input type="submit" value="Cadastrar" />
            </fieldset>
        </form>

        <?php 
            $lista_contatos = [];
            
            if (array_key_exists('contato', $_GET)) {
                $lista_contatos[] = $_GET['contato'];
            }
            
            if (array_key_exists('contato', $_GET)) {
                $_SESSION['lista_contatos'][] = $_GET['contato'];

            }
            
            $lista_contatos = [];

            if (array_key_exists('lista_contatos', $_SESSION)) {
                $lista_contatos = $_SESSION['lista_contatos'];
            }
        ?>


    </body>

    <table>
        <tr>
            <th>Contatos</th>
        </tr>

        <?php foreach ($lista_contatos as $contatos): ?>
            <tr>
                <td><?php echo $contatos; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</html>