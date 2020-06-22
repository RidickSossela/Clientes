<?php
    require_once('../Model/PessoaFisica.php');
    require_once('../Model/Cnpj.php');
    
if($_GET['cate'] == 'pessoaFisica') {
        $pessoaFisica = PessoaFisica::pesquisar($_GET['busca']);
        
        echo $pessoaFisica;
    }
    else{
        $cnpj = Cnpj::pesquisar($_GET['busca']);
        
        echo $cnpj;

    }
?>