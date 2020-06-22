<article id="cnpj">
    <button type="submit" class="btn-cadastrar" id="btnCadastrarCnpj">Cadastrar CNPJ</button>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome Fantasia</th>
                <th>Categoria</th>
                <th>CNPJ</th>
                <th>Inscrição Estadual</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody id="tbody-cnpj">
            <?php 
                require_once('../Model/Cnpj.php');
                $clientes = Cnpj::getClientes();
            ?>
            <td><?= $clientes['id_cliente']?></td>
            <td><?= $clientes['nome_fantasia']?></td>
            <td><?= $clientes['categoria']?></td>
            <td><?= $clientes['cnpj']?></td>
            <td><?= $clientes['inscricao_estadual']?></td>
            <td><?= $clientes['endereco']?></td>

        </tbody>
    </table>
</article>