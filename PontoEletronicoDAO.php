<?php 
    require_once 'ConexaoBD.php';
    require_once 'PontoEletronico.php';
    class PontoEletronicoDAO {

        private $pdo;
    
        public function __construct() {
            $this->pdo = ConexaoBD::getConexao();
        }
    
        public function selecionar($cpf) {
            $sql = "SELECT * FROM ponto WHERE cpf = :cpf";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->execute();
        
            // Se encontrou um registro
            if ($stmt->rowCount() > 0) {
                $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        
                $ponto = new PontoEletronico();
                $ponto->setCpf($dados['cpf']);
                $ponto->setDataRegistro($dados['dataRegistro']);
                $ponto->setHorarioEntradaM($dados['horarioEntradaM']);
                $ponto->setHorarioSaidaM($dados['horarioSaidaM']);
                $ponto->setHorarioEntradaV($dados['horarioEntradaV']);
                $ponto->setHorarioSaidaV($dados['horarioSaidaV']);
                $ponto->setHorarioEntradaEx($dados['horarioEntradaEx']);
                $ponto->setHorarioSaidaEx($dados['horarioSaidaEx']);
                $ponto->setSalarioDoDia($dados['salarioDoDia']);
        
                return $ponto;
            } else {
                return null; // CPF não encontrado
            }
        }
    }
?>