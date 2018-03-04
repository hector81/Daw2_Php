<?php
include_once __DIR__ . '/../../app/conf/sanitize.php';
class LineaVenta {
    private $idVenta;// INT IDENTITY NOT NULL,
    private $idArticulo;// int NOT NULL,
    private $cantidad;//int NOT NULL,
    private $pc;//MONEY NOT NULL
		//constraint PkLineaVenta PRIMARY KEY (idVenta,idArticulo),
		//constraint FkVentaNLineaVenta foreign KEY (idVenta) references venta(idVenta)

    function __construct(array $lineaVenta){
      $this->idVenta = $lineaVenta['idVenta'];
      $this->idArticulo = $lineaVenta['idArticulo'];
      $this->cantidad = $lineaVenta['cantidad'];
      $this->pc = $lineaVenta['pc'];
    }

    public function getIdVenta() :int{
      return $this->idVenta;
    }

    public function setIdVenta(int $idVenta){
      $this->idVenta = sanear($idVenta);
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

    public function getPc() :float{
      return $this->pc;
    }

    public function setPc(float $pc){
      $this->pc = sanear($pc);
    }
}

 ?>
