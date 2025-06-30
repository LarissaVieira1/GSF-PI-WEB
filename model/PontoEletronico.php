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

        // Getters e Setters
        public function getCpf() { return $this->Cpf; }
        public function setCpf($Cpf) { $this->Cpf = $Cpf; }

        public function getDataRegistro() { return $this->DataRegistro; }
        public function setDataRegistro($DataRegistro) { $this->DataRegistro = $DataRegistro; }

        public function getHorarioEntradaM() { return $this->HorarioEntradaM; }
        public function setHorarioEntradaM($HorarioEntradaM) { $this->HorarioEntradaM = $HorarioEntradaM; }

        public function getHorarioSaidaM() { return $this->HorarioSaidaM; }
        public function setHorarioSaidaM($HorarioSaidaM) { $this->HorarioSaidaM = $HorarioSaidaM; }

        public function getHorarioEntradaV() { return $this->HorarioEntradaV; }
        public function setHorarioEntradaV($HorarioEntradaV) { $this->HorarioEntradaV = $HorarioEntradaV; }

        public function getHorarioSaidaV() { return $this->HorarioSaidaV; }
        public function setHorarioSaidaV($HorarioSaidaV) { $this->HorarioSaidaV = $HorarioSaidaV; }

        public function getHorarioEntradaEx() { return $this->HorarioEntradaEx; }
        public function setHorarioEntradaEx($HorarioEntradaEx) { $this->HorarioEntradaEx = $HorarioEntradaEx; }

        public function getHorarioSaidaEx() { return $this->HorarioSaidaEx; }
        public function setHorarioSaidaEx($HorarioSaidaEx) { $this->HorarioSaidaEx = $HorarioSaidaEx; }

        public function getSalarioDoDia() { return $this->SalarioDoDia; }
        public function setSalarioDoDia($SalarioDoDia) { $this->SalarioDoDia = $SalarioDoDia; }
    }
    
?>