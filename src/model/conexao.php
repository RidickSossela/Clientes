<?php
    $usuario = "root";
    $senha = "";

    try {
        $conn = new PDO('mysql:host=localhost;dbname=clientes', $usuario, $senha);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      }
?>