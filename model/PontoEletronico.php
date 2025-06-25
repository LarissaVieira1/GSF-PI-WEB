<?php 
   class PontoEletronico {
    
        private $cpf;
        private $dataRegistro;
        private $horarioEntradaM;
        private $horarioSaidaM;
        private $horarioEntradaV;
        private $horarioSaidaV;
        private $horarioEntradaEx;
        private $horarioSaidaEx;
        private $salarioDoDia;

        // Getters e Setters
        public function getCpf() { return $this->cpf; }
        public function setCpf($cpf) { $this->cpf = $cpf; }

        public function getDataRegistro() { return $this->dataRegistro; }
        public function setDataRegistro($data) { $this->dataRegistro = $data; }

        public function getHorarioEntradaM() { return $this->horarioEntradaM; }
        public function setHorarioEntradaM($hora) { $this->horarioEntradaM = $hora; }

        public function getHorarioSaidaM() { return $this->horarioSaidaM; }
        public function setHorarioSaidaM($hora) { $this->horarioSaidaM = $hora; }

        public function getHorarioEntradaV() { return $this->horarioEntradaV; }
        public function setHorarioEntradaV($hora) { $this->horarioEntradaV = $hora; }

        public function getHorarioSaidaV() { return $this->horarioSaidaV; }
        public function setHorarioSaidaV($hora) { $this->horarioSaidaV = $hora; }

        public function getHorarioEntradaEx() { return $this->horarioEntradaEx; }
        public function setHorarioEntradaEx($hora) { $this->horarioEntradaEx = $hora; }

        public function getHorarioSaidaEx() { return $this->horarioSaidaEx; }
        public function setHorarioSaidaEx($hora) { $this->horarioSaidaEx = $hora; }

        public function getSalarioDoDia() { return $this->salarioDoDia; }
        public function setSalarioDoDia($salario) { $this->salarioDoDia = $salario; }
    }
    
?>