<article id="pessoaFisica">
    <table>
        <thead>
            <tr>
                <th>Id</th>    
                <th>Nome</th>
                <th>Categoria</th>
                <th>CPF</th>
                <th>Data Nascimento</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require_once('../model/PessoaFisica.php');
                $clientes = PessoaFisica::getClientes();
            ?>
            <tr>
                <td><?= $clientes['id_cliente']?></td>
                <td><?= $clientes['nome']?></td>
                <td><?= $clientes['categoria']?></td>
                <td><?= $clientes['cpf']?></td>
                <td><?= $clientes['data_nascimento']?></td> 
            </tr>           
        </tbody>
    </table>  
</article>