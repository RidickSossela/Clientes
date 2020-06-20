<?php
    require_once('./model/PessoaFisica.php');
    require_once('./model/Cnpj.php');
    
if($_GET['cate'] == 'pessoaFisica') {
        $pessoaFisica = PessoaFisica::pesquisar($_GET['busca']);
        
        echo $pessoaFisica;
    }
    else{
        $cnpj = Cnpj::pesquisar($_GET['busca']);
        
        echo $cnpj;

    }

?>