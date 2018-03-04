<?php
include_once __DIR__ . '/../../app/conf/sanitize.php';
class Reserva{
    private $idUsuario;// NVARCHAR(100) not null, --id usuario o id seesion
    private $grupo;// NVARCHAR(20) NOT NULL,
    private $fReserva;//fReserva DATETIME2(7) not null,

    function __construct(array $reserva){
      $this->idUsuario = $reserva['idUsuario'];
      $this->grupo = $reserva['grupo'];
      $this->fReserva = $reserva['fReserva'];
    }

    public function getIdUsuario() :string{
      return $this->idUsuario;
    }

    public function setIdUsuario(string $idUsuario){
      $this->idUsuario = sanear($idUsuario);
    }

    public function getGrupo() :string{
      return $this->grupo;
    }

    public function setGrupo(string $grupo){
      $this->grupo = sanear($grupo);
    }

    public function getFReserva() :date{
      return $this->fReserva;
    }

    public function setFReserva(date $fReserva){
      $this->fReserva = sanear($fReserva);
    }
}

 ?>
