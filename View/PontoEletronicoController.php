<?php 
        include_once 'model/ConexaoBD.php';
        include_once 'model/PontoEletronico.php';
        include_once 'model/PontoEletronicoDAO.php';

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

                header("Location: rota.php?pagina=VisualizarHorarios");
                exit();

            } else {
                echo "Funcionário com CPF <strong>" . htmlspecialchars($cpf) . "</strong> não encontrado.";
            }
        } else {
            echo "CPF não foi enviado.";
        }
?>
