<?php 
    include_once 'ConexaoBD.php';
    include_once 'PontoEletronico.php';
    class PontoEletronicoDAO {

        private $pdo;
    
        function __construct() {
            
            $this->pdo = ConexaoBD::getConexao();
        }
    
        public function selecionar($cpf) {
            $sql = "SELECT * FROM registrohora WHERE cpf = :cpf";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->execute();
        
        $dados = $stmt->fetchALL(PDO::FETCH_ASSOC);
    //  die(var_dump($dados));
            if (count($dados) > 0) {
                //Array de Pontos
                $ponto=[];
               // die(var_dump($dados));

                //foreach para colocar dados no array de ponto
                foreach($dados as $linha){
                    $p = new PontoEletronico($linha['Cpf'],$linha['DataRegistro'],$linha['HorarioEntradaM'],$linha['HorarioSaidaM'],$linha['HorarioEntradaV'],
                    $linha['HorarioSaidaV'],$linha['HorarioEntradaEx'],$linha['HorarioSaidaEx'],$linha['SalarioDoDia']);
                    array_push($ponto, $p);
                }
                return $ponto;
            } else {
                return null; // CPF não encontrado
            }
        }
    }
?>