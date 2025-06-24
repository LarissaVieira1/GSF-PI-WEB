<?php 
    require_once 'ConexaoBD.php';
    require_once 'PontoEletronico.php';
    require_once 'PontoEletronicoDAO.php';

    if (isset($_POST['cpf'])) {
        $cpf = $_POST['cpf'];
    
        $dao = new PontoEletronicoDAO();
        $ponto = $dao->selecionar($cpf);
    
        if ($ponto) {

           session_start();
           $_SESSION['ponto'] = [
            'cpf' => $ponto->getCpf(),
            'data' => $ponto->getDataRegistro(),
            'entradaM' => $ponto->getHorarioEntradaM(),
            'saidaM' => $ponto->getHorarioSaidaM(),
            'entradaV' => $ponto->getHorarioEntradaV(),
            'saidaV' => $ponto->getHorarioSaidaV(),
            'entradaEx' => $ponto->getHorarioEntradaEx(),
            'saidaEx' => $ponto->getHorarioSaidaEx(),
            'salario' => $ponto->getSalarioDoDia()
        ];

            header("Location: VisualizarHorariosController.php");
            exit();

        } else {
            echo "Funcionário com CPF <strong>" . htmlspecialchars($cpf) . "</strong> não encontrado.";
        }
    } else {
        echo "CPF não foi enviado.";
    }
?>