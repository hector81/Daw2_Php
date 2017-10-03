<?php

class Participa {

    private $idEvento;
    private $idParticipante;

    function __construct($idEvento,$idParticipante) {
        $this->idEvento = $idEvento;
		$this->idParticipante = $idParticipante;
    }

    function getIdEvento() {
        return $this->idEvento;
    }

    function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }
	
	function getIdParticipante() {
        return $this->idParticipante;
    }

    function setIdParticipante($idParticipante) {
        $this->idParticipante = $idParticipante;
    }
}