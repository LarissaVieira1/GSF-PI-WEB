<?php
    if(isset($_GET ('rota'))){
        $rota=$_GET('rota');
    }else{
        $rota="login";
    }

    switch($rota){
        case 'login':
            header("location:PontoEletronicoController.php");
            require "PontoEletronicoController.php";
            break;
            
        case 'autenticar':
            
            break;
            
        default:
            echo "Rota Desconhecida";
    }
?>