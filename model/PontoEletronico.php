<?php 
   class PontoEletronico {
    
        private $Cpf;
        private $DataRegistro;
        private $HorarioEntradaM;
        private $HorarioSaidaM;
        private $HorarioEntradaV;
        private $HorarioSaidaV;
        private $HorarioEntradaEx;
        private $HorarioSaidaEx;
        private $SalarioDoDia;
         
        public function __construct($Cpf, $DataRegistro, $HorarioEntradaM = null, $HorarioSaidaM = null, $HorarioEntradaV = null,
          $HorarioSaidaV = null, $HorarioEntradaEx = null, $HorarioSaidaEx = null, $SalarioDoDia = 0.0){
            $this->Cpf = $Cpf;
            $this->DataRegistro = $DataRegistro;
            $this->HorarioEntradaM = $HorarioEntradaM;
            $this->HorarioSaidaM = $HorarioSaidaM;
            $this->HorarioEntradaV = $HorarioEntradaV;
            $this->HorarioSaidaV = $HorarioSaidaV;
            $this->HorarioEntradaEx = $HorarioEntradaEx;
            $this->HorarioSaidaEx = $HorarioSaidaEx;
            $this->SalarioDoDia = $SalarioDoDia;
        }

        // Getters
        public function getCpf() { return $this->Cpf; }
        public function getDataRegistro() { return $this->DataRegistro; }
        public function getHorarioEntradaM() { return $this->HorarioEntradaM; }
        public function getHorarioSaidaM() { return $this->HorarioSaidaM; }
        public function getHorarioEntradaV() { return $this->HorarioEntradaV; }
        public function getHorarioSaidaV() { return $this->HorarioSaidaV; }
        public function getHorarioEntradaEx() { return $this->HorarioEntradaEx; }
        public function getHorarioSaidaEx() { return $this->HorarioSaidaEx; }
        public function getSalarioDoDia() { return $this->SalarioDoDia; }
        
    }
    
?>