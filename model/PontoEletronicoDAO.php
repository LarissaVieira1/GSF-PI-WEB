<?php 
    require_once '../model/ConexaoBD.php';
    require_once '../model/PontoEletronico.php';
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
            if (count($dados) > 0) {
                //Array de Pontos
                $ponto=[];

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

        public function selecionarMes($cpf, $Mes){
            $sql = "SELECT * FROM registrohora WHERE cpf = :cpf AND MONTH(DataRegistro) = :Mes";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->bindValue(':Mes', $Mes);
            $stmt->execute();
            $dados = $stmt->fetchALL(PDO::FETCH_ASSOC);
            if (count($dados) > 0) {
                //Array de Pontos
                $ponto=[];

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