<html>
    <head>
        <meta charset="utf-8" />
        <title>Gerenciador de contatos</title>
        <link rel="stylesheet" href="tarefas.css" type="text/css" />
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
                <label>
                    Telefone (Opcional):
                    <input type="number" name="telefone" />
                </label>
                <label>
                    Email (Opcional):
                    <input type="email" name="email" />
                </label>
                <label>
                    Descrição (Opcional):
                    <textarea name="descricao"></textarea>
                </label>
                <label>
                    Data de Nascimento (Opcional):
                    <input type="text" name="nascimento" />
                </label>
                <label>
                    Favorito:
                    <input type="checkbox" name="favorito" value="1" />
                </label>
                <input type="submit" value="Cadastrar" />
            </fieldset>
        </form>
        <table>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>Descrição</th>
                <th>Favoritos</th>
            </tr>
            <?php foreach ($lista_contatos as $contato) : ?>
                <tr>
                    <td><?php echo $contato['contato']; ?></td>
                    <td><?php echo $contato['telefone']; ?></td>
                    <td><?php echo $contato['email']; ?></td>
                    <td><?php echo traduz_data_para_exibir($contato['nascimento']); ?></td>
                    <td><?php echo $contato['descricao']; ?></td>
                    <td><?php echo traduz_favorito($contato['favorito']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>