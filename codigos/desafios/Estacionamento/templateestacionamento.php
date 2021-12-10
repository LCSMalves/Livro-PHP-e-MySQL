<html>
    <head>
        <meta charset="utf-8" />
        <title>Gerenciador de Estacionamento</title>
        <link rel="stylesheet" href="tarefas.css" type="text/css" />
    </head>
    <body>
        <h1>Gerenciador de Estacionamento</h1>
        <form>
            <fieldset>
                <legend>Entrada veiculo</legend>
                <label>
                    Placa:
                    <input type="text" name="placa" />
                </label>
                <label>
                    Marca:
                    <input type="text" name="marca" />
                </label>
                <label>
                    Modelo:
                    <input type="text" name="modelo" />
                </label>
                <label>
                    Hora de Entrada:
                    <input type="datetime-local" name="hora_entrada" />
                </label>
                <label>
                    Hoora de Saida:
                    <input type="datetime-local" name="hora_saida" />
                </label>
                <input type="submit" value="Cadastrar" />
            </fieldset>
        </form>
        <table>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Hora e Data de Entrada</th>
                <th>Hora e Data de Saida</th>
            </tr>
            <?php foreach ($lista_estacionamento as $estacionamento) : ?>
                <tr>
                    <td><?php echo $estacionamento['placa']; ?></td>
                    <td><?php echo $estacionamento['marca']; ?></td>
                    <td><?php echo $estacionamento['modelo']; ?></td>
                    <td><?php echo traduz_data_para_exibir($estacionamento['hora_entrada']); ?></td>
                    <td><?php echo traduz_data_para_exibir($estacionamento['hora_saida']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>