<?php

class Medico {

    private $IdMedico;
    private $NombreMedico;
	private $Centro;
	private $TelefonoMedico;
	private $DniMedico;
	private $EspecialidadMedico;

    function __construct($IdMedico,$NombreMedico,$Centro,$TelefonoMedico,$DniMedico,$EspecialidadMedico) {
        $this->IdMedico = $IdMedico;
		$this->NombreMedico = $NombreMedico;
		$this->Centro = $Centro;
		$this->TelefonoMedico = $TelefonoMedico;
		$this->DniMedico = $DniMedico;
		$this->EspecialidadMedico = $EspecialidadMedico;
    }

    function getIdMedico() {
        return $this->IdMedico;
    }

    function setIdMedico($IdMedico) {
        $this->IdMedico = $IdMedico;
    }
	
	function getNombreMedico() {
        return $this->NombreMedico;
    }

    function setNombreMedico($NombreMedico) {
        $this->NombreMedico = $NombreMedico;
    }
	
	function getCentro() {
        return $this->Centro;
    }

    function setCentro($Centro) {
        $this->Centro = $Centro;
    }
	
	function getTelefonoMedico() {
        return $this->TelefonoMedico;
    }

    function setTelefonoMedico($TelefonoMedico) {
        $this->TelefonoMedico = $TelefonoMedico;
    }
	
	function getDniMedico() {
        return $this->DniMedico;
    }

    function setDniMedico($DniMedico) {
        $this->DniMedico = $DniMedico;
    }
	
	function getEspecialidadMedico() {
        return $this->EspecialidadMedico;
    }

    function setEspecialidadMedico($EspecialidadMedico) {
        $this->EspecialidadMedico = $EspecialidadMedico;
    }
	

}