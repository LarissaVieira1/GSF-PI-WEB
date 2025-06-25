<?php
            include_once 'model/ConexaoBD.php';
            include_once 'model/PontoEletronico.php';
            include_once 'model/PontoEletronicoDAO.php';

    if (!isset($_SESSION['ponto'])) {
        echo "Nenhuma informação de ponto encontrada.";
        exit();
    }

    $ponto = $_SESSION['ponto'];   
?>

