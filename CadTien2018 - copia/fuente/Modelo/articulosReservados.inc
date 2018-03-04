<?php
include_once __DIR__ . '/../../app/conf/sanitize.php';
class ArticulosReservados {
    private $idUsuario ;//NVARCHAR(100) NOT NULL,
    private $idArticulo;// INT NOT NULL,
    private $cantidad ;//INT NOT NULL,
    private $pReserva;// MONEY NOT NULL,
    private $idTienda;// INT NOT NULL,


    function __construct(array $articulosReservados){
      $this->idUsuario = $articulosReservados['idUsuario'];
      $this->idArticulo = $articulosReservados['idArticulo'];
      $this->cantidad = $articulosReservados['cantidad'];
      $this->pReserva = $articulosReservados['pReserva'];
      $this->idTienda = $articulosReservados['idTienda'];
    }

    public function getIdUsuario() :string{
      return $this->idUsuario;
    }

    public function setIdUsuario(string $idUsuario){
      $this->idUsuario = sanear($idUsuario);
    }

    public function getIdArticulo() :int{
      return $this->idArticulo;
    }

    public function setIdArticulo(int $idArticulo){
      $this->idArticulo = sanear($idArticulo);
    }

    public function getCantidad() :int{
      return $this->cantidad;
    }

    public function setCantidad(int $cantidad){
      $this->cantidad = sanear($cantidad);
    }

    public function getPReserva() :int{
      return $this->pReserva;
    }

    public function setPReserva(int $pReserva){
      $this->pReserva = sanear($pReserva);
    }

    public function getIdTienda() :int{
      return $this->idTienda;
    }

    public function setIdTienda(int $idTienda){
      $this->idTienda = sanear($idTienda);
    }

}

 ?>
