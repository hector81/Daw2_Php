<?php

class Cita {

    private $IdCita;
    private $IdPaciente;
	private $IdMedico;

    function __construct($IdCita,$IdPaciente,$IdMedico) {
        $this->IdCita = $IdCita;
		$this->IdPaciente = $IdPaciente;
		$this->IdMedico = $IdMedico;
    }

    function getIdCita() {
        return $this->IdCita;
    }

    function setIdCita($IdCita) {
        $this->IdCita = $IdCita;
    }
	
	function getIdPaciente() {
        return $this->IdPaciente;
    }

    function setIdPaciente($IdPaciente) {
        $this->IdPaciente = $IdPaciente;
    }
	
	function getIdMedico() {
        return $this->IdMedico;
    }

    function setIdMedico($IdMedico) {
        $this->IdMedico = $IdMedico;
    }
	
}