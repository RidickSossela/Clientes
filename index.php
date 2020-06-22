<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="./src/assets/style.css">
</head>
<body>
<header class="cabecalho">
        <div class="title"> 
            <h1> Clientes</h1>
        </div>
        <nav class="nav" id="nav">
            <ul>
                <li> <a href="#pessoafisica" id="menupf">PESSOA FISICA</a> </li>
                <li> <a href="#cnpj" id="menucnpj">CNPJ</a> </li>
                <li>Buscar: <input class="buscar" tela="pessoaFisica" type="search" id="buscar"></li>
            </ul>
        </nav>
    </header>
    
    <section>
    <?php
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "localhost/clientes/src/View/cnpj.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $pagina = curl_exec($ch);
        curl_close($ch);
        echo $pagina;
    ?>
    </section>

    <section>
    <?php
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "localhost/clientes/src/View/pessoaFisica.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $pagina = curl_exec($ch);
        curl_close($ch);
        echo $pagina;
    ?>
    </section>
</body>
<script src="./src/assets/js/script.js"></script> 
<script src="./src/assets/js/ajax.js"></script> 
</html>