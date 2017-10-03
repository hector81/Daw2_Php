<?php

class Paciente {

    private $nombrePaciente;
    private $direccionPaciente;
	private $telefonoPaciente;
	private $dniPaciente;
	private $fechaCita;
	private $horaCita;
	private $minutoCita;
	private $medicoCita;
	private $especialidadCita;

    function __construct($nombrePaciente,$direccionPaciente,$telefonoPaciente,$dniPaciente,$fechaCita,$horaCita,$minutoCita,$medicoCita,$especialidadCita) {
        $this->nombrePaciente = $nombrePaciente;
		$this->direccionPaciente = $direccionPaciente;
		$this->telefonoPaciente = $telefonoPaciente;
		$this->dniPaciente = $dniPaciente;
		$this->fechaCita = $fechaCita;
		$this->horaCita = $horaCita;
		$this->minutoCita = $minutoCita;
		$this->medicoCita = $medicoCita;
		$this->especialidadCita = $especialidadCita;
    }

    function getNombrePaciente() {
        return $this->nombrePaciente;
    }

    function setNombrePaciente($nombrePaciente) {
        $this->nombrePaciente = $nombrePaciente;
    }
	
	function getDireccionPaciente() {
        return $this->direccionPaciente;
    }

    function setDireccionPaciente($direccionPaciente) {
        $this->direccionPaciente = $direccionPaciente;
    }
	
	function getTelefonoPaciente() {
        return $this->telefonoPaciente;
    }

    function setTelefonoPaciente($telefonoPaciente) {
        $this->telefonoPaciente = $telefonoPaciente;
    }
	
	function getDniPaciente() {
        return $this->dniPaciente;
    }

    function setDniPaciente($dniPaciente) {
        $this->dniPaciente = $dniPaciente;
    }
	
	function getFechaCita() {
        return $this->fechaCita;
    }

    function setFechaCita($fechaCita) {
        $this->fechaCita = $fechaCita;
    }
	
	function getHoraCita() {
        return $this->horaCita;
    }

    function setHoraCita($horaCita) {
        $this->horaCita = $horaCita;
    }
	
	function getMinutoCita() {
        return $this->minutoCita;
    }

    function setMinutoCita($minutoCita) {
        $this->minutoCita = $minutoCita;
    }
	
	function getMedicoCita() {
        return $this->medicoCita;
    }

    function setMedicoCita($medicoCita) {
        $this->medicoCita = $medicoCita;
    }
	
	function getEspecialidadCita() {
        return $this->especialidadCita;
    }

    function setEspecialidadCita($especialidadCita) {
        $this->especialidadCita = $especialidadCita;
    }

 

}