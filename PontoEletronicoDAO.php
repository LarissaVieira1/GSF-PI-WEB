<?php 
    include_once 'ConexaoBD.php';
    include_once 'PontoEletronico.php';
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
                $dados = $stmt->fetchALL(PDO::FETCH_ASSOC);
                //Array de Pontos
                $ponto=[];

                //foreach para colocar dados no array de ponto
                foreach($dados as $linha){
                    $p = new PontoEletronico($dados['cpf'],$dados['dataRegistro'],$dados['horarioEntradaM'],$dados['horarioSaidaM'],$dados['horarioEntradaV'],
                    $dados['horarioSaidaV'],$dados['horarioEntradaEx'],$dados['horarioSaidaEx'],$dados['salarioDoDia'])
                    array_push($ponto, $p);
                }
                return $ponto;
            } else {
                return null; // CPF não encontrado
            }
        }
    }
?>